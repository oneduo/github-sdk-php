<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/list-public-events-for-repo-network
 *
 * > [!NOTE]
 * > This API is not built to serve real-time use cases. Depending on the time of day, event
 * latency can be anywhere from 30s to 6h.
 */
class ActivityListPublicEventsForRepoNetwork extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/networks/{$this->owner}/{$this->repo}/events";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
