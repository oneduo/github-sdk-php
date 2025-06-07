<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * migrations/set-lfs-preference
 *
 * You can import repositories from Subversion, Mercurial, and TFS that include files larger than
 * 100MB. This ability
 * is powered by [Git LFS](https://git-lfs.com).
 *
 * You can learn more about our LFS
 * feature and working with large files [on our
 * help
 * site](https://docs.github.com/repositories/working-with-files/managing-large-files).
 *
 * >
 * [!WARNING]
 * > **Endpoint closing down notice:** Due to very low levels of usage and available
 * alternatives, this endpoint is closing down and will no longer be available from 00:00 UTC on April
 * 12, 2024. For more details and alternatives, see the
 * [changelog](https://gh.io/source-imports-api-deprecation).
 */
class MigrationsSetLfsPreference extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/import/lfs";
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
