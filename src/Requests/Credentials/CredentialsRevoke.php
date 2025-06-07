<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Credentials;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * credentials/revoke
 *
 * Submit a list of credentials to be revoked. This endpoint is intended to revoke credentials the
 * caller does not own and may have found exposed on GitHub.com or elsewhere. It can also be used for
 * credentials associated with an old user account that you no longer have access to. Credential owners
 * will be notified of the revocation.
 *
 * This endpoint currently accepts the following credential
 * types:
 * - Personal access tokens (classic)
 * - Fine-grained personal access tokens
 *
 * Revoked credentials
 * may impact users on GitHub Free, Pro, & Team and GitHub Enterprise Cloud, and GitHub Enterprise
 * Cloud with Enterprise Managed Users.
 * GitHub cannot reactivate any credentials that have been
 * revoked; new credentials will need to be generated.
 *
 * To prevent abuse, this API is limited to only
 * 60 unauthenticated requests per hour and a max of 1000 tokens per API request.
 *
 * > [!NOTE]
 * > Any
 * authenticated requests will return a 403.
 */
class CredentialsRevoke extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/credentials/revoke';
    }

    public function __construct() {}
}
