<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-by-id
 *
 * Gets a repository using its ID.
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
class ReposGetById extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repositories/{$this->id}";
    }

    /**
     * @param  int  $id  The unique identifier of the repository
     */
    public function __construct(
        protected int $id,
    ) {}
}
