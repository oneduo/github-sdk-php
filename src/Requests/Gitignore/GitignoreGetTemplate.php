<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Gitignore;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gitignore/get-template
 *
 * Get the content of a gitignore template.
 *
 * This endpoint supports the following custom media types.
 * For more information, see "[Media
 * types](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types)."
 *
 * -
 * **`application/vnd.github.raw+json`**: Returns the raw .gitignore contents.
 */
class GitignoreGetTemplate extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/gitignore/templates/{$this->name}";
    }

    public function __construct(
        protected string $name,
    ) {}
}
