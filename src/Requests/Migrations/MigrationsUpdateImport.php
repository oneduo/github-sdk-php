<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * migrations/update-import
 *
 * An import can be updated with credentials or a project choice by passing in the appropriate
 * parameters in this API
 * request. If no parameters are provided, the import will be restarted.
 *
 * Some
 * servers (e.g. TFS servers) can have several projects at a single URL. In those cases the import
 * progress will
 * have the status `detection_found_multiple` and the Import Progress response will
 * include a `project_choices` array.
 * You can select the project to import by providing one of the
 * objects in the `project_choices` array in the update request.
 *
 * > [!WARNING]
 * > **Endpoint closing
 * down notice:** Due to very low levels of usage and available alternatives, this endpoint is closing
 * down and will no longer be available from 00:00 UTC on April 12, 2024. For more details and
 * alternatives, see the [changelog](https://gh.io/source-imports-api-deprecation).
 */
class MigrationsUpdateImport extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
