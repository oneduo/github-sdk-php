<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeScanning;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * code-scanning/update-default-setup
 *
 * Updates a code scanning default setup configuration.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `repo` scope to use this endpoint with private or public repositories, or the
 * `public_repo` scope to use this endpoint with only public repositories.
 */
class CodeScanningUpdateDefaultSetup extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/default-setup";
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
