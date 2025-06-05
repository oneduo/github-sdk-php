<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/update-webhook
 *
 * Updates a webhook configured in a repository. If you previously had a `secret` set, you must provide
 * the same `secret` or set a new `secret` or the secret will be removed. If you are only updating
 * individual webhook `config` properties, use "[Update a webhook configuration for a
 * repository](/rest/webhooks/repo-config#update-a-webhook-configuration-for-a-repository)."
 */
class ReposUpdateWebhook extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string {
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
