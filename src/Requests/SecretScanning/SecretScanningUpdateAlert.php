<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\SecretScanning;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * secret-scanning/update-alert
 *
 * Updates the status of a secret scanning alert in an eligible repository.
 *
 * The authenticated user
 * must be an administrator for the repository or for the organization that owns the repository to use
 * this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the `repo` or
 * `security_events` scope to use this endpoint. If this endpoint is only used with public
 * repositories, the token can use the `public_repo` scope instead.
 */
class SecretScanningUpdateAlert extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/secret-scanning/alerts/{$this->alertNumber}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $alertNumber,
    ) {}
}
