<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/get-by-id
 *
 * Provides publicly available information about someone with a GitHub account. This method takes their
 * durable user `ID` instead of their `login`, which can change over time.
 *
 * If you are requesting
 * information about an [Enterprise Managed
 * User](https://docs.github.com/enterprise-cloud@latest/admin/managing-iam/understanding-iam-for-enterprises/about-enterprise-managed-users),
 * or a GitHub App bot that is installed in an organization that uses Enterprise Managed Users, your
 * requests must be authenticated as a user or GitHub App that has access to the organization to view
 * that account's information. If you are not authorized, the request will return a `404 Not Found`
 * status.
 *
 * The `email` key in the following response is the publicly visible email address from your
 * GitHub [profile page](https://github.com/settings/profile). When setting up your profile, you can
 * select a primary email address to be public which provides an email entry for this endpoint. If you
 * do not set a public email address for `email`, then it will have a value of `null`. You only see
 * publicly visible email addresses when authenticated with GitHub. For more information, see
 * [Authentication](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#authentication).
 *
 * The
 * Emails API enables you to list all of your email addresses, and toggle a primary email to be visible
 * publicly. For more information, see [Emails API](https://docs.github.com/rest/users/emails).
 */
class UsersGetById extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/user/{$this->accountId}";
    }

    /**
     * @param  int  $accountId  account_id parameter
     */
    public function __construct(
        protected int $accountId,
    ) {}
}
