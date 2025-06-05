<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-org-rulesets
 *
 * Get all the repository rulesets for an organization.
 */
class ReposGetOrgRulesets extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/rulesets";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $targets  A comma-separated list of rule targets to filter by.
     *                                If provided, only rulesets that apply to the specified targets will be returned.
     *                                For example, `branch,tag,push`.
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?string $targets = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page,
            'per_page' => $this->perPage, 'targets' => $this->targets]);
    }
}
