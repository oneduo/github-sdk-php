<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/test-push-webhook
 *
 * This will trigger the hook with the latest push to the current repository if the hook is subscribed
 * to `push` events. If the hook is not subscribed to `push` events, the server will respond with 204
 * but no test POST will be generated.
 *
 * > [!NOTE]
 * > Previously
 * `/repos/:owner/:repo/hooks/:hook_id/test`
 */
class ReposTestPushWebhook extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/hooks/{$this->hookId}/tests";
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
