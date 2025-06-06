<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Authenticators;

use DateInterval;
use DateTimeImmutable;
use InvalidArgumentException;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Encoding\ChainedFormatter;
use Lcobucci\JWT\Encoding\UnifyAudience;
use Lcobucci\JWT\Encoding\UnixTimestampDates;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Signer\Rsa\Sha256;
use OpenSSLAsymmetricKey;
use Saloon\Contracts\Authenticator;
use Saloon\Http\PendingRequest;

class AppAuthenticator implements Authenticator {
    /**
     * @param  string  $appId  GitHub App ID
     * @param  OpenSSLAsymmetricKey|string  $key  OpenSSL key object, key string content or key file path.
     * @param  string|null  $passphrase  Optional passphrase for encrypted keys
     */
    public function __construct(
        private readonly string|int $appId,
        private readonly OpenSSLAsymmetricKey|string $key,
        private readonly ?string $passphrase = null
    ) {}

    public function set(PendingRequest $pendingRequest): void {
        $jwt = $this->generateJwt();

        $pendingRequest->headers()->add('Authorization', "Bearer $jwt");
    }

    private function generateJwt(): string {
        $configuration = Configuration::forAsymmetricSigner(
            new Sha256,
            $this->getSigningKey(),
            $this->getSigningKey(),
        );

        $now = new DateTimeImmutable;

        $issuedAt = $now->sub(new DateInterval('PT30S'));

        $expiresAt = $now->add(new DateInterval('PT10M'));

        $formatter = new ChainedFormatter(new UnifyAudience, new UnixTimestampDates);

        $token = $configuration->builder($formatter)
            ->issuedBy($this->appId)
            ->issuedAt($issuedAt)
            ->expiresAt($expiresAt)
            ->getToken($configuration->signer(), $configuration->signingKey());

        return $token->toString();
    }

    private function getSigningKey(): InMemory {
        if ($this->key instanceof OpenSSLAsymmetricKey) {
            if (!openssl_pkey_export($this->key, $keyContent, $this->passphrase)) {
                throw new InvalidArgumentException('Failed to export OpenSSL key to PEM format');
            }

            return InMemory::plainText($keyContent, $this->passphrase ?? '');
        }

        if (is_string($this->key)) {
            // Check if the key looks like actual key content
            if (str_starts_with($this->key, '-----BEGIN')) {
                return InMemory::plainText($this->key, $this->passphrase ?? '');
            }

            // Assume it's a file path
            return InMemory::file($this->key, $this->passphrase ?? '');
        }

        throw new InvalidArgumentException('Key must be an OpenSSLAsymmetricKey, file path, or key content string');
    }
}
