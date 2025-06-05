<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/download-tarball-archive
 *
 * Gets a redirect URL to download a tar archive for a repository. If you omit `:ref`, the
 * repository’s default branch (usually
 * `main`) will be used. Please make sure your HTTP framework is
 * configured to follow redirects or you will need to use
 * the `Location` header to make a second `GET`
 * request.
 *
 * > [!NOTE]
 * > For private repositories, these links are temporary and expire after five
 * minutes.
 */
class ReposDownloadTarballArchive extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/tarball/{$this->ref}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $ref,
    ) {}
}
