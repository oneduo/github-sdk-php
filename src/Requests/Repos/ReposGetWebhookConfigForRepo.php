<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-webhook-config-for-repo
 *
 * Returns the webhook configuration for a repository. To get more information about the webhook,
 * including the `active` state and `events`, use "[Get a repository
 * webhook](/rest/webhooks/repos#get-a-repository-webhook)."
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `read:repo_hook` or `repo` scope to use this endpoint.
 */
class ReposGetWebhookConfigForRepo extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/hooks/{$this->hookId}/config";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $hookId,
    ) {}
}
