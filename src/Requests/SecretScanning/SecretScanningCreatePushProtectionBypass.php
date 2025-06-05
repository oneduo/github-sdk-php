<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\SecretScanning;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * secret-scanning/create-push-protection-bypass
 *
 * Creates a bypass for a previously push protected secret.
 *
 * The authenticated user must be the
 * original author of the committed secret.
 *
 * OAuth app tokens and personal access tokens (classic) need
 * the `repo` scope to use this endpoint.
 */
class SecretScanningCreatePushProtectionBypass extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/secret-scanning/push-protection-bypasses";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {}
}
