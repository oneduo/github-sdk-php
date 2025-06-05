<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/start-import
 *
 * Start a source import to a GitHub repository using GitHub Importer.
 * Importing into a GitHub
 * repository with GitHub Actions enabled is not supported and will
 * return a status `422 Unprocessable
 * Entity` response.
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** Due to very low levels of usage
 * and available alternatives, this endpoint is closing down and will no longer be available from 00:00
 * UTC on April 12, 2024. For more details and alternatives, see the
 * [changelog](https://gh.io/source-imports-api-deprecation).
 */
class MigrationsStartImport extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/import";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {}
}
