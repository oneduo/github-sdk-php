<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/get-alert
 *
 * OAuth app tokens and personal access tokens (classic) need the `security_events` scope to use this
 * endpoint. If this endpoint is only used with public repositories, the token can use the
 * `public_repo` scope instead.
 */
class DependabotGetAlert extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/dependabot/alerts/{$this->alertNumber}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies a Dependabot alert in its repository.
     *                            You can find this at the end of the URL for a Dependabot alert within GitHub,
     *                            or in `number` fields in the response from the
     *                            `GET /repos/{owner}/{repo}/dependabot/alerts` operation.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $alertNumber,
    ) {}
}
