<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/get-commit-authors
 *
 * Each type of source control system represents authors in a different way. For example, a Git commit
 * author has a display name and an email address, but a Subversion commit author just has a username.
 * The GitHub Importer will make the author information valid, but the author might not be correct. For
 * example, it will change the bare Subversion username `hubot` into something like `hubot
 * <hubot@12341234-abab-fefe-8787-fedcba987654>`.
 *
 * This endpoint and the [Map a commit
 * author](https://docs.github.com/rest/migrations/source-imports#map-a-commit-author) endpoint allow
 * you to provide correct Git author information.
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** Due
 * to very low levels of usage and available alternatives, this endpoint is closing down and will no
 * longer be available from 00:00 UTC on April 12, 2024. For more details and alternatives, see the
 * [changelog](https://gh.io/source-imports-api-deprecation).
 */
class MigrationsGetCommitAuthors extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/import/authors";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|int  $since  A user ID. Only return users with an ID greater than this ID.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?int $since = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['since' => $this->since]);
    }
}
