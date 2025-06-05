<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-org-variable
 *
 * Creates an organization variable that you can reference in a GitHub Actions workflow.
 *
 * Authenticated
 * users must have collaborator access to a repository to create, update, or read variables.
 *
 * OAuth
 * tokens and personal access tokens (classic) need the`admin:org` scope to use this endpoint. If the
 * repository is private, OAuth tokens and personal access tokens (classic) need the `repo` scope to
 * use this endpoint.
 */
class ActionsCreateOrgVariable extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/variables";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
