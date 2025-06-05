<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/delete-issue-type
 *
 * Deletes an issue type for an organization.
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
class OrgsDeleteIssueType extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/issue-types/{$this->issueTypeId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $issueTypeId  The unique identifier of the issue type.
     */
    public function __construct(
        protected string $org,
        protected int $issueTypeId,
    ) {}
}
