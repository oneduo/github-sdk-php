<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-dispatch-event
 *
 * You can use this endpoint to trigger a webhook event called `repository_dispatch` when you want
 * activity that happens outside of GitHub to trigger a GitHub Actions workflow or GitHub App webhook.
 * You must configure your GitHub Actions workflow or GitHub App to run when the `repository_dispatch`
 * event occurs. For an example `repository_dispatch` webhook payload, see
 * "[RepositoryDispatchEvent](https://docs.github.com/webhooks/event-payloads/#repository_dispatch)."
 *
 * The
 * `client_payload` parameter is available for any extra information that your workflow might need.
 * This parameter is a JSON payload that will be passed on when the webhook event is dispatched. For
 * example, the `client_payload` can include a message that a user would like to send using a GitHub
 * Actions workflow. Or the `client_payload` can be used as a test to debug your workflow.
 *
 * This input
 * example shows how you can use the `client_payload` as a test to debug your workflow.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ReposCreateDispatchEvent extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/dispatches";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {}
}
