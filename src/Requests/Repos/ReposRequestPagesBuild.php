<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/request-pages-build
 *
 * You can request that your site be built from the latest revision on the default branch. This has the
 * same effect as pushing a commit to your default branch, but does not require an additional commit.
 * Manually triggering page builds can be helpful when diagnosing build warnings and failures.
 *
 * Build
 * requests are limited to one concurrent build per repository and one concurrent build per requester.
 * If you request a build while another is still in progress, the second request will be queued until
 * the first completes.
 */
class ReposRequestPagesBuild extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/pages/builds";
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
