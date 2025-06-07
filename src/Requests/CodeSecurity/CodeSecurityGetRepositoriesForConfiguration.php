<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-security/get-repositories-for-configuration
 *
 * Lists the repositories associated with a code security configuration in an organization.
 *
 * The
 * authenticated user must be an administrator or security manager for the organization to use this
 * endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the `write:org` scope to use
 * this endpoint.
 */
class CodeSecurityGetRepositoriesForConfiguration extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/code-security/configurations/{$this->configurationId}/repositories";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     * @param  null|string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $status  A comma-separated list of statuses. If specified, only repositories with these attachment statuses will be returned.
     *
     * Can be: `all`, `attached`, `attaching`, `detached`, `removed`, `enforced`, `failed`, `updating`, `removed_by_enterprise`
     */
    public function __construct(
        protected string $org,
        protected int $configurationId,
        protected ?string $before = null,
        protected ?string $status = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['before' => $this->before, 'status' => $this->status]);
    }
}
