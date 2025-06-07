<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Interactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * interactions/set-restrictions-for-authenticated-user
 *
 * Temporarily restricts which type of GitHub user can interact with your public repositories. Setting
 * the interaction limit at the user level will overwrite any interaction limits that are set for
 * individual repositories owned by the user.
 */
class InteractionsSetRestrictionsForAuthenticatedUser extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/user/interaction-limits';
    }

    public function __construct() {}
}
