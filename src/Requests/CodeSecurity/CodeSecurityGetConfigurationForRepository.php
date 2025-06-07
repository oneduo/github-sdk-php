<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-security/get-configuration-for-repository
 *
 * Get the code security configuration that manages a repository's code security settings.
 *
 * The
 * authenticated user must be an administrator or security manager for the organization to use this
 * endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the `repo` scope to use this
 * endpoint.
 */
class CodeSecurityGetConfigurationForRepository extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-security-configuration";
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
