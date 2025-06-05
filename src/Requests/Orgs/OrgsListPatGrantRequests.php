<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-pat-grant-requests
 *
 * Lists requests from organization members to access organization resources with a fine-grained
 * personal access token.
 *
 * Only GitHub Apps can use this endpoint.
 */
class OrgsListPatGrantRequests extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/personal-access-token-requests";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $sort  The property by which to sort the results.
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|array  $owner  A list of owner usernames to use to filter the results.
     * @param  null|string  $repository  The name of the repository to use to filter the results.
     * @param  null|string  $permission  The permission to use to filter the results.
     * @param  null|string  $lastUsedBefore  Only show fine-grained personal access tokens used before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|string  $lastUsedAfter  Only show fine-grained personal access tokens used after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|array  $tokenId  The ID of the token
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?array $owner = null,
        protected ?string $repository = null,
        protected ?string $permission = null,
        protected ?string $lastUsedBefore = null,
        protected ?string $lastUsedAfter = null,
        protected ?array $tokenId = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'page' => $this->page,
            'sort' => $this->sort,
            'direction' => $this->direction,
            'owner' => $this->owner,
            'repository' => $this->repository,
            'permission' => $this->permission,
            'last_used_before' => $this->lastUsedBefore,
            'last_used_after' => $this->lastUsedAfter,
            'token_id' => $this->tokenId,
        ]);
    }
}
