<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/create-issue-type
 *
 * Create a new issue type for an organization.
 *
 * You can find out more about issue types in [Managing
 * issue types in an
 * organization](https://docs.github.com/issues/tracking-your-work-with-issues/configuring-issues/managing-issue-types-in-an-organization).
 *
 * To
 * use this endpoint, the authenticated user must be an administrator for the organization. OAuth app
 * tokens and
 * personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class OrgsCreateIssueType extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/issue-types";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
