<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/list-alert-instances
 *
 * Lists all instances of the specified code scanning alert.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `security_events` scope to use this endpoint with private or public
 * repositories, or the `public_repo` scope to use this endpoint with only public repositories.
 */
class CodeScanningListAlertInstances extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/alerts/{$this->alertNumber}/instances";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $ref  The Git reference for the results you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     * @param  null|int  $pr  The number of the pull request for the results you want to list.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $alertNumber,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?string $ref = null,
        protected ?int $pr = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page,
            'per_page' => $this->perPage, 'ref' => $this->ref, 'pr' => $this->pr]);
    }
}
