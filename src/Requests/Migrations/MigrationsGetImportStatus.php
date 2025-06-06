<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/get-import-status
 *
 * View the progress of an import.
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** Due to very low
 * levels of usage and available alternatives, this endpoint is closing down and will no longer be
 * available from 00:00 UTC on April 12, 2024. For more details and alternatives, see the
 * [changelog](https://gh.io/source-imports-api-deprecation).
 *
 * **Import status**
 *
 * This section includes
 * details about the possible values of the `status` field of the Import Progress response.
 *
 * An import
 * that does not have errors will progress through these steps:
 *
 * *   `detecting` - the "detection" step
 * of the import is in progress because the request did not include a `vcs` parameter. The import is
 * identifying the type of source control present at the URL.
 * *   `importing` - the "raw" step of the
 * import is in progress. This is where commit data is fetched from the original repository. The import
 * progress response will include `commit_count` (the total number of raw commits that will be
 * imported) and `percent` (0 - 100, the current progress through the import).
 * *   `mapping` - the
 * "rewrite" step of the import is in progress. This is where SVN branches are converted to Git
 * branches, and where author updates are applied. The import progress response does not include
 * progress information.
 * *   `pushing` - the "push" step of the import is in progress. This is where
 * the importer updates the repository on GitHub. The import progress response will include
 * `push_percent`, which is the percent value reported by `git push` when it is "Writing objects".
 * *
 * `complete` - the import is complete, and the repository is ready on GitHub.
 *
 * If there are problems,
 * you will see one of these in the `status` field:
 *
 * *   `auth_failed` - the import requires
 * authentication in order to connect to the original repository. To update authentication for the
 * import, please see the [Update an
 * import](https://docs.github.com/rest/migrations/source-imports#update-an-import) section.
 * *
 * `error` - the import encountered an error. The import progress response will include the
 * `failed_step` and an error message. Contact [GitHub
 * Support](https://support.github.com/contact?tags=dotcom-rest-api) for more information.
 * *
 * `detection_needs_auth` - the importer requires authentication for the originating repository to
 * continue detection. To update authentication for the import, please see the [Update an
 * import](https://docs.github.com/rest/migrations/source-imports#update-an-import) section.
 * *
 * `detection_found_nothing` - the importer didn't recognize any source control at the URL. To resolve,
 * [Cancel the import](https://docs.github.com/rest/migrations/source-imports#cancel-an-import) and
 * [retry](https://docs.github.com/rest/migrations/source-imports#start-an-import) with the correct
 * URL.
 * *   `detection_found_multiple` - the importer found several projects or repositories at the
 * provided URL. When this is the case, the Import Progress response will also include a
 * `project_choices` field with the possible project choices as values. To update project choice,
 * please see the [Update an
 * import](https://docs.github.com/rest/migrations/source-imports#update-an-import) section.
 *
 * **The
 * project_choices field**
 *
 * When multiple projects are found at the provided URL, the response hash
 * will include a `project_choices` field, the value of which is an array of hashes each representing a
 * project choice. The exact key/value pairs of the project hashes will differ depending on the version
 * control type.
 *
 * **Git LFS related fields**
 *
 * This section includes details about Git LFS related
 * fields that may be present in the Import Progress response.
 *
 * *   `use_lfs` - describes whether the
 * import has been opted in or out of using Git LFS. The value can be `opt_in`, `opt_out`, or
 * `undecided` if no action has been taken.
 * *   `has_large_files` - the boolean value describing
 * whether files larger than 100MB were found during the `importing` step.
 * *   `large_files_size` - the
 * total size in gigabytes of files larger than 100MB found in the originating repository.
 * *
 * `large_files_count` - the total number of files larger than 100MB found in the originating
 * repository. To see a list of these files, make a "Get Large Files" request.
 */
class MigrationsGetImportStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
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
