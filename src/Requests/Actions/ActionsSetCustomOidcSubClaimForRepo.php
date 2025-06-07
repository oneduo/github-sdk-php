<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-custom-oidc-sub-claim-for-repo
 *
 * Sets the customization template and `opt-in` or `opt-out` flag for an OpenID Connect (OIDC) subject
 * claim for a repository.
 *
 * OAuth app tokens and personal access tokens (classic) need the `repo` scope
 * to use this endpoint.
 */
class ActionsSetCustomOidcSubClaimForRepo extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/oidc/customization/sub";
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
