<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-webhook-deliveries
 *
 * Returns a list of webhook deliveries for a webhook configured in a repository.
 */
class ReposListWebhookDeliveries extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/hooks/{$this->hookId}/deliveries";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     * @param  null|string  $cursor  Used for pagination: the starting delivery from which the page of deliveries is fetched. Refer to the `link` header for the next and previous page cursors.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $hookId,
        protected ?string $cursor = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['cursor' => $this->cursor]);
    }
}
