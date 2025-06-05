<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-remove-token-for-repo
 *
 * Returns a token that you can pass to the `config` script to remove a self-hosted runner from an
 * repository. The token expires after one hour.
 *
 * For example, you can replace `TOKEN` in the following
 * example with the registration token provided by this endpoint to remove your self-hosted runner from
 * an organization:
 *
 * ```
 * ./config.sh remove --token TOKEN
 * ```
 *
 * Authenticated users must have admin
 * access to the repository to use this endpoint.
 *
 * OAuth tokens and personal access tokens (classic)
 * need the `repo` scope to use this endpoint.
 */
class ActionsCreateRemoveTokenForRepo extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/actions/runners/remove-token";
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
