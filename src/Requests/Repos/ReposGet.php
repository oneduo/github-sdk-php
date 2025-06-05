<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get
 *
 * The `parent` and `source` objects are present when the repository is a fork. `parent` is the
 * repository this repository was forked from, `source` is the ultimate source for the network.
 *
 * >
 * [!NOTE]
 * > In order to see the `security_and_analysis` block for a repository you must have admin
 * permissions for the repository or be an owner or security manager for the organization that owns the
 * repository. For more information, see "[Managing security managers in your
 * organization](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/managing-security-managers-in-your-organization)."
 */
class ReposGet extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}";
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
