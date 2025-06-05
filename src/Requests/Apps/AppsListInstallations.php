<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/list-installations
 *
 * The permissions the installation has are included under the `permissions` key.
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsListInstallations extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/app/installations';
    }

    /**
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function __construct(
        protected ?int $page = null,
        protected ?string $since = null,
        protected ?string $outdated = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'since' => $this->since, 'outdated' => $this->outdated]);
    }
}
