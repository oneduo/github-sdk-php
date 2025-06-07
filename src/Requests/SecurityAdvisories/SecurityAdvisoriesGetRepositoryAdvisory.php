<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\SecurityAdvisories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * security-advisories/get-repository-advisory
 *
 * Get a repository security advisory using its GitHub Security Advisory (GHSA) identifier.
 *
 * Anyone can
 * access any published security advisory on a public repository.
 *
 * The authenticated user can access an
 * unpublished security advisory from a repository if they are a security manager or administrator of
 * that repository, or if they are a
 * collaborator on the security advisory.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `repo` or `repository_advisories:read` scope to to get a
 * published security advisory in a private repository, or any unpublished security advisory that the
 * authenticated user has access to.
 */
class SecurityAdvisoriesGetRepositoryAdvisory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/security-advisories/{$this->ghsaId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ghsaId  The GHSA (GitHub Security Advisory) identifier of the advisory.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $ghsaId,
    ) {}
}
