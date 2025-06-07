<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/generate-release-notes
 *
 * Generate a name and body describing a
 * [release](https://docs.github.com/rest/releases/releases#get-a-release). The body content will be
 * markdown formatted and contain information like the changes since last release and users who
 * contributed. The generated release notes are not saved anywhere. They are intended to be generated
 * and used when creating a new release.
 */
class ReposGenerateReleaseNotes extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/releases/generate-notes";
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
