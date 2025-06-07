<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-remove-token-for-org
 *
 * Returns a token that you can pass to the `config` script to remove a self-hosted runner from an
 * organization. The token expires after one hour.
 *
 * For example, you can replace `TOKEN` in the
 * following example with the registration token provided by this endpoint to remove your self-hosted
 * runner from an organization:
 *
 * ```
 * ./config.sh remove --token TOKEN
 * ```
 *
 * Authenticated users must
 * have admin access to the organization to use this endpoint.
 *
 * OAuth tokens and personal access tokens
 * (classic) need the`admin:org` scope to use this endpoint. If the repository is private, OAuth tokens
 * and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsCreateRemoveTokenForOrg extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/runners/remove-token";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
