<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-security/get-configurations-for-org
 *
 * Lists all code security configurations available in an organization.
 *
 * The authenticated user must be
 * an administrator or security manager for the organization to use this endpoint.
 *
 * OAuth app tokens
 * and personal access tokens (classic) need the `write:org` scope to use this endpoint.
 */
class CodeSecurityGetConfigurationsForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/code-security/configurations";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|string  $targetType  The target type of the code security configuration
     * @param  null|string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?string $targetType = null,
        protected ?string $before = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['target_type' => $this->targetType, 'before' => $this->before]);
    }
}
