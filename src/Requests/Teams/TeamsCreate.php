<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * teams/create
 *
 * To create a team, the authenticated user must be a member or owner of `{org}`. By default,
 * organization members can create teams. Organization owners can limit team creation to organization
 * owners. For more information, see "[Setting team creation
 * permissions](https://docs.github.com/articles/setting-team-creation-permissions-in-your-organization)."
 *
 * When
 * you create a new team, you automatically become a team maintainer without explicitly adding yourself
 * to the optional array of `maintainers`. For more information, see "[About
 * teams](https://docs.github.com/github/setting-up-and-managing-organizations-and-teams/about-teams)".
 */
class TeamsCreate extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/teams";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
