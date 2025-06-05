<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list
 *
 * Lists all organizations, in the order that they were created.
 *
 * > [!NOTE]
 * > Pagination is powered
 * exclusively by the `since` parameter. Use the [Link
 * header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers) to
 * get the URL for the next page of organizations.
 */
class OrgsList extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/organizations';
    }

    /**
     * @param  null|int  $since  An organization ID. Only return organizations with an ID greater than this ID.
     */
    public function __construct(
        protected ?int $since = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['since' => $this->since]);
    }
}
