<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/list-public-org-events
 *
 * > [!NOTE]
 * > This API is not built to serve real-time use cases. Depending on the time of day, event
 * latency can be anywhere from 30s to 6h.
 */
class ActivityListPublicOrgEvents extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/events";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page]);
    }
}
