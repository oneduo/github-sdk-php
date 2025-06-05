<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-public
 *
 * Lists all public repositories in the order that they were created.
 *
 * Note:
 * - For GitHub Enterprise
 * Server, this endpoint will only list repositories available to all users on the enterprise.
 * -
 * Pagination is powered exclusively by the `since` parameter. Use the [Link
 * header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers) to
 * get the URL for the next page of repositories.
 */
class ReposListPublic extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/repositories';
    }

    /**
     * @param  null|int  $since  A repository ID. Only return repositories with an ID greater than this ID.
     */
    public function __construct(
        protected ?int $since = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['since' => $this->since]);
    }
}
