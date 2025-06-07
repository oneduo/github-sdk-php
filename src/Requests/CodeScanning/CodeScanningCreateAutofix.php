<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeScanning;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * code-scanning/create-autofix
 *
 * Creates an autofix for a code scanning alert.
 *
 * If a new autofix is to be created as a result of this
 * request or is currently being generated, then this endpoint will return a 202 Accepted response.
 *
 * If
 * an autofix already exists for a given alert, then this endpoint will return a 200 OK
 * response.
 *
 * OAuth app tokens and personal access tokens (classic) need the `security_events` scope to
 * use this endpoint with private or public repositories, or the `public_repo` scope to use this
 * endpoint with only public repositories.
 */
class CodeScanningCreateAutofix extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/alerts/{$this->alertNumber}/autofix";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $alertNumber,
    ) {}
}
