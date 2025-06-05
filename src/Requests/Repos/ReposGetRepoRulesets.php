<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-repo-rulesets
 *
 * Get all the rulesets for a repository.
 */
class ReposGetRepoRulesets extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/rulesets";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|bool  $includesParents  Include rulesets configured at higher levels that apply to this repository
     * @param  null|string  $targets  A comma-separated list of rule targets to filter by.
     *                                If provided, only rulesets that apply to the specified targets will be returned.
     *                                For example, `branch,tag,push`.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?bool $includesParents = null,
        protected ?string $targets = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page,
            'per_page' => $this->perPage, 'includes_parents' => $this->includesParents, 'targets' => $this->targets]);
    }
}
