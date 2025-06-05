<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/list-alerts-for-repo
 *
 * Lists code scanning alerts.
 *
 * The response includes a `most_recent_instance` object.
 * This provides
 * details of the most recent instance of this alert
 * for the default branch (or for the specified Git
 * reference if you used `ref` in the request).
 *
 * OAuth app tokens and personal access tokens (classic)
 * need the `security_events` scope to use this endpoint with private or public repositories, or the
 * `public_repo` scope to use this endpoint with only public repositories.
 */
class CodeScanningListAlertsForRepo extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/alerts";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $toolName  The name of a code scanning tool. Only results by this tool will be listed. You can specify the tool by using either `tool_name` or `tool_guid`, but not both.
     * @param  null|string  $toolGuid  The GUID of a code scanning tool. Only results by this tool will be listed. Note that some code scanning tools may not include a GUID in their analysis data. You can specify the tool by using either `tool_guid` or `tool_name`, but not both.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $ref  The Git reference for the results you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     * @param  null|int  $pr  The number of the pull request for the results you want to list.
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $sort  The property by which to sort the results.
     * @param  null|string  $state  If specified, only code scanning alerts with this state will be returned.
     * @param  null|string  $severity  If specified, only code scanning alerts with this severity will be returned.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $toolName = null,
        protected ?string $toolGuid = null,
        protected ?int $page = null,
        protected ?string $ref = null,
        protected ?int $pr = null,
        protected ?string $direction = null,
        protected ?string $before = null,
        protected ?string $sort = null,
        protected ?string $state = null,
        protected ?string $severity = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'tool_name' => $this->toolName,
            'tool_guid' => $this->toolGuid,
            'page' => $this->page,
            'ref' => $this->ref,
            'pr' => $this->pr,
            'direction' => $this->direction,
            'before' => $this->before,
            'sort' => $this->sort,
            'state' => $this->state,
            'severity' => $this->severity,
        ]);
    }
}
