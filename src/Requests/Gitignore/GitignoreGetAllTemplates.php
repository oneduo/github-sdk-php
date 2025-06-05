<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Gitignore;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gitignore/get-all-templates
 *
 * List all templates available to pass as an option when [creating a
 * repository](https://docs.github.com/rest/repos/repos#create-a-repository-for-the-authenticated-user).
 */
class GitignoreGetAllTemplates extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/gitignore/templates';
    }

    public function __construct() {}
}
