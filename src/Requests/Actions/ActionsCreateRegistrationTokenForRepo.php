<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-registration-token-for-repo
 *
 * Returns a token that you can pass to the `config` script. The token expires after one hour.
 *
 * For
 * example, you can replace `TOKEN` in the following example with the registration token provided by
 * this endpoint to configure your self-hosted runner:
 *
 * ```
 * ./config.sh --url
 * https://github.com/octo-org --token TOKEN
 * ```
 *
 * Authenticated users must have admin access to the
 * repository to use this endpoint.
 *
 * OAuth tokens and personal access tokens (classic) need the `repo`
 * scope to use this endpoint.
 */
class ActionsCreateRegistrationTokenForRepo extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runners/registration-token";
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
