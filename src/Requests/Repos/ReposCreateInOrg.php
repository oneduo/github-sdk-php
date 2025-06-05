<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-in-org
 *
 * Creates a new repository in the specified organization. The authenticated user must be a member of
 * the organization.
 *
 * OAuth app tokens and personal access tokens (classic) need the `public_repo` or
 * `repo` scope to create a public repository, and `repo` scope to create a private repository.
 */
class ReposCreateInOrg extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/repos";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
