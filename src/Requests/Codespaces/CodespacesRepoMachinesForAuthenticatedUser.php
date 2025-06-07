<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/repo-machines-for-authenticated-user
 *
 * List the machine types available for a given repository based on its configuration.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `codespace` scope to use this endpoint.
 */
class CodespacesRepoMachinesForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/codespaces/machines";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $location  The location to check for available machines. Assigned by IP if not provided.
     * @param  null|string  $clientIp  IP for location auto-detection when proxying a request
     * @param  null|string  $ref  The branch or commit to check for prebuild availability and devcontainer restrictions.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $location = null,
        protected ?string $clientIp = null,
        protected ?string $ref = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['location' => $this->location, 'client_ip' => $this->clientIp, 'ref' => $this->ref]);
    }
}
