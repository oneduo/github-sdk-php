<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\SecretScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * secret-scanning/list-locations-for-alert
 *
 * Lists all locations for a given secret scanning alert for an eligible repository.
 *
 * The authenticated
 * user must be an administrator for the repository or for the organization that owns the repository to
 * use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the `repo` or
 * `security_events` scope to use this endpoint. If this endpoint is only used with public
 * repositories, the token can use the `public_repo` scope instead.
 */
class SecretScanningListLocationsForAlert extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/secret-scanning/alerts/{$this->alertNumber}/locations";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $alertNumber,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
