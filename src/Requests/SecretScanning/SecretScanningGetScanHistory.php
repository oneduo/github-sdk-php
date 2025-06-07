<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\SecretScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * secret-scanning/get-scan-history
 *
 * Lists the latest default incremental and backfill scans by type for a repository. Scans from Copilot
 * Secret Scanning are not included.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `repo` or `security_events` scope to use this endpoint. If this endpoint is only used with public
 * repositories, the token can use the `public_repo` scope instead.
 */
class SecretScanningGetScanHistory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/secret-scanning/scan-history";
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
