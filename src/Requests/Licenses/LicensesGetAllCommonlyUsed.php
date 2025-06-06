<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Licenses;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * licenses/get-all-commonly-used
 *
 * Lists the most commonly used licenses on GitHub. For more information, see "[Licensing a repository
 * ](https://docs.github.com/repositories/managing-your-repositorys-settings-and-features/customizing-your-repository/licensing-a-repository)."
 */
class LicensesGetAllCommonlyUsed extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/licenses';
    }

    /**
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected ?bool $featured = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['featured' => $this->featured, 'page' => $this->page, 'per_page' => $this->perPage]);
    }
}
