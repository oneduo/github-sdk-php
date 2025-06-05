<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Gists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gists/delete-comment
 */
class GistsDeleteComment extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/gists/{$this->gistId}/comments/{$this->commentId}";
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function __construct(
        protected string $gistId,
        protected int $commentId,
    ) {}
}
