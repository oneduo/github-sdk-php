<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * codespaces/stop-in-organization
 *
 * Stops a user's codespace.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `admin:org` scope to use this endpoint.
 */
class CodespacesStopInOrganization extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/members/{$this->username}/codespaces/{$this->codespaceName}/stop";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function __construct(
        protected string $org,
        protected string $username,
        protected string $codespaceName,
    ) {}
}
