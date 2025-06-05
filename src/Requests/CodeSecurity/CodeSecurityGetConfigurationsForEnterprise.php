<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-security/get-configurations-for-enterprise
 *
 * Lists all code security configurations available in an enterprise.
 *
 * The authenticated user must be
 * an administrator of the enterprise in order to use this endpoint.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `read:enterprise` scope to use this endpoint.
 */
class CodeSecurityGetConfigurationsForEnterprise extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/enterprises/{$this->enterprise}/code-security/configurations";
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  null|string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $enterprise,
        protected ?string $before = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['before' => $this->before]);
    }
}
