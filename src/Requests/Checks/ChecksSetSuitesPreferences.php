<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Checks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * checks/set-suites-preferences
 *
 * Changes the default automatic flow when creating check suites. By default, a check suite is
 * automatically created each time code is pushed to a repository. When you disable the automatic
 * creation of check suites, you can manually [Create a check
 * suite](https://docs.github.com/rest/checks/suites#create-a-check-suite).
 * You must have admin
 * permissions in the repository to set preferences for check suites.
 */
class ChecksSetSuitesPreferences extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/check-suites/preferences";
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
