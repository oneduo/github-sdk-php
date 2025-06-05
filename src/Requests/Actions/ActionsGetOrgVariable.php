<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-org-variable
 *
 * Gets a specific variable in an organization.
 *
 * The authenticated user must have collaborator access
 * to a repository to create, update, or read variables.
 *
 * OAuth tokens and personal access tokens
 * (classic) need the`admin:org` scope to use this endpoint. If the repository is private, OAuth tokens
 * and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsGetOrgVariable extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/variables/{$this->name}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function __construct(
        protected string $org,
        protected string $name,
    ) {}
}
