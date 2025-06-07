<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * migrations/map-commit-author
 *
 * Update an author's identity for the import. Your application can continue updating authors any time
 * before you push
 * new commits to the repository.
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** Due
 * to very low levels of usage and available alternatives, this endpoint is closing down and will no
 * longer be available from 00:00 UTC on April 12, 2024. For more details and alternatives, see the
 * [changelog](https://gh.io/source-imports-api-deprecation).
 */
class MigrationsMapCommitAuthor extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/import/authors/{$this->authorId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $authorId,
    ) {}
}
