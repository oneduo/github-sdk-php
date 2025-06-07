<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/pre-flight-with-repo-for-authenticated-user
 *
 * Gets the default attributes for codespaces created by the user with the repository.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `codespace` scope to use this endpoint.
 */
class CodespacesPreFlightWithRepoForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/codespaces/new";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $ref  The branch or commit to check for a default devcontainer path. If not specified, the default branch will be checked.
     * @param  null|string  $clientIp  An alternative IP for default location auto-detection, such as when proxying a request.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $ref = null,
        protected ?string $clientIp = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['ref' => $this->ref, 'client_ip' => $this->clientIp]);
    }
}
