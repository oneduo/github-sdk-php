<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-webhook
 *
 * Returns a webhook configured in a repository. To get only the webhook `config` properties, see "[Get
 * a webhook configuration for a
 * repository](/rest/webhooks/repo-config#get-a-webhook-configuration-for-a-repository)."
 */
class ReposGetWebhook extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/hooks/{$this->hookId}";
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
