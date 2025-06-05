<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Users\UsersAddEmailForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersAddSocialAccountForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersBlock;
use Oneduo\GitHubSdk\Requests\Users\UsersCheckBlocked;
use Oneduo\GitHubSdk\Requests\Users\UsersCheckFollowingForUser;
use Oneduo\GitHubSdk\Requests\Users\UsersCheckPersonIsFollowedByAuthenticated;
use Oneduo\GitHubSdk\Requests\Users\UsersCreateGpgKeyForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersCreatePublicSshKeyForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersCreateSshSigningKeyForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersDeleteEmailForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersDeleteGpgKeyForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersDeletePublicSshKeyForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersDeleteSocialAccountForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersDeleteSshSigningKeyForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersFollow;
use Oneduo\GitHubSdk\Requests\Users\UsersGetAuthenticated;
use Oneduo\GitHubSdk\Requests\Users\UsersGetById;
use Oneduo\GitHubSdk\Requests\Users\UsersGetByUsername;
use Oneduo\GitHubSdk\Requests\Users\UsersGetContextForUser;
use Oneduo\GitHubSdk\Requests\Users\UsersGetGpgKeyForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersGetPublicSshKeyForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersGetSshSigningKeyForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersList;
use Oneduo\GitHubSdk\Requests\Users\UsersListAttestations;
use Oneduo\GitHubSdk\Requests\Users\UsersListBlockedByAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListEmailsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListFollowedByAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListFollowersForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListFollowersForUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListFollowingForUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListGpgKeysForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListGpgKeysForUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListPublicEmailsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListPublicKeysForUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListPublicSshKeysForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListSocialAccountsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListSocialAccountsForUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListSshSigningKeysForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersListSshSigningKeysForUser;
use Oneduo\GitHubSdk\Requests\Users\UsersSetPrimaryEmailVisibilityForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Users\UsersUnblock;
use Oneduo\GitHubSdk\Requests\Users\UsersUnfollow;
use Oneduo\GitHubSdk\Requests\Users\UsersUpdateAuthenticated;
use Saloon\Http\Response;

class Users extends GitHubResource {
    public function usersGetAuthenticated(): Response {
        return $this->connector->send(new UsersGetAuthenticated);
    }

    public function usersUpdateAuthenticated(): Response {
        return $this->connector->send(new UsersUpdateAuthenticated);
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListBlockedByAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new UsersListBlockedByAuthenticatedUser($page));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function usersCheckBlocked(string $username): Response {
        return $this->connector->send(new UsersCheckBlocked($username));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function usersBlock(string $username): Response {
        return $this->connector->send(new UsersBlock($username));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function usersUnblock(string $username): Response {
        return $this->connector->send(new UsersUnblock($username));
    }

    public function usersSetPrimaryEmailVisibilityForAuthenticatedUser(): Response {
        return $this->connector->send(new UsersSetPrimaryEmailVisibilityForAuthenticatedUser);
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListEmailsForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new UsersListEmailsForAuthenticatedUser($page));
    }

    public function usersAddEmailForAuthenticatedUser(): Response {
        return $this->connector->send(new UsersAddEmailForAuthenticatedUser);
    }

    public function usersDeleteEmailForAuthenticatedUser(): Response {
        return $this->connector->send(new UsersDeleteEmailForAuthenticatedUser);
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListFollowersForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new UsersListFollowersForAuthenticatedUser($page));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListFollowedByAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new UsersListFollowedByAuthenticatedUser($page));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function usersCheckPersonIsFollowedByAuthenticated(string $username): Response {
        return $this->connector->send(new UsersCheckPersonIsFollowedByAuthenticated($username));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function usersFollow(string $username): Response {
        return $this->connector->send(new UsersFollow($username));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function usersUnfollow(string $username): Response {
        return $this->connector->send(new UsersUnfollow($username));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListGpgKeysForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new UsersListGpgKeysForAuthenticatedUser($page));
    }

    public function usersCreateGpgKeyForAuthenticatedUser(): Response {
        return $this->connector->send(new UsersCreateGpgKeyForAuthenticatedUser);
    }

    /**
     * @param  int  $gpgKeyId  The unique identifier of the GPG key.
     */
    public function usersGetGpgKeyForAuthenticatedUser(int $gpgKeyId): Response {
        return $this->connector->send(new UsersGetGpgKeyForAuthenticatedUser($gpgKeyId));
    }

    /**
     * @param  int  $gpgKeyId  The unique identifier of the GPG key.
     */
    public function usersDeleteGpgKeyForAuthenticatedUser(int $gpgKeyId): Response {
        return $this->connector->send(new UsersDeleteGpgKeyForAuthenticatedUser($gpgKeyId));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListPublicSshKeysForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new UsersListPublicSshKeysForAuthenticatedUser($page));
    }

    public function usersCreatePublicSshKeyForAuthenticatedUser(): Response {
        return $this->connector->send(new UsersCreatePublicSshKeyForAuthenticatedUser);
    }

    /**
     * @param  int  $keyId  The unique identifier of the key.
     */
    public function usersGetPublicSshKeyForAuthenticatedUser(int $keyId): Response {
        return $this->connector->send(new UsersGetPublicSshKeyForAuthenticatedUser($keyId));
    }

    /**
     * @param  int  $keyId  The unique identifier of the key.
     */
    public function usersDeletePublicSshKeyForAuthenticatedUser(int $keyId): Response {
        return $this->connector->send(new UsersDeletePublicSshKeyForAuthenticatedUser($keyId));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListPublicEmailsForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new UsersListPublicEmailsForAuthenticatedUser($page));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListSocialAccountsForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new UsersListSocialAccountsForAuthenticatedUser($page));
    }

    public function usersAddSocialAccountForAuthenticatedUser(): Response {
        return $this->connector->send(new UsersAddSocialAccountForAuthenticatedUser);
    }

    public function usersDeleteSocialAccountForAuthenticatedUser(): Response {
        return $this->connector->send(new UsersDeleteSocialAccountForAuthenticatedUser);
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListSshSigningKeysForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new UsersListSshSigningKeysForAuthenticatedUser($page));
    }

    public function usersCreateSshSigningKeyForAuthenticatedUser(): Response {
        return $this->connector->send(new UsersCreateSshSigningKeyForAuthenticatedUser);
    }

    /**
     * @param  int  $sshSigningKeyId  The unique identifier of the SSH signing key.
     */
    public function usersGetSshSigningKeyForAuthenticatedUser(int $sshSigningKeyId): Response {
        return $this->connector->send(new UsersGetSshSigningKeyForAuthenticatedUser($sshSigningKeyId));
    }

    /**
     * @param  int  $sshSigningKeyId  The unique identifier of the SSH signing key.
     */
    public function usersDeleteSshSigningKeyForAuthenticatedUser(int $sshSigningKeyId): Response {
        return $this->connector->send(new UsersDeleteSshSigningKeyForAuthenticatedUser($sshSigningKeyId));
    }

    /**
     * @param  int  $accountId  account_id parameter
     */
    public function usersGetById(int $accountId): Response {
        return $this->connector->send(new UsersGetById($accountId));
    }

    /**
     * @param  int  $since  A user ID. Only return users with an ID greater than this ID.
     */
    public function usersList(?int $since): Response {
        return $this->connector->send(new UsersList($since));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function usersGetByUsername(string $username): Response {
        return $this->connector->send(new UsersGetByUsername($username));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  string  $subjectDigest  Subject Digest
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $predicateType  Optional filter for fetching attestations with a given predicate type.
     *                                 This option accepts `provenance`, `sbom`, or freeform text for custom predicate types.
     */
    public function usersListAttestations(
        string $username,
        string $subjectDigest,
        ?string $before,
        ?string $predicateType,
    ): Response {
        return $this->connector->send(new UsersListAttestations($username, $subjectDigest, $before, $predicateType));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListFollowersForUser(string $username, ?int $page): Response {
        return $this->connector->send(new UsersListFollowersForUser($username, $page));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListFollowingForUser(string $username, ?int $page): Response {
        return $this->connector->send(new UsersListFollowingForUser($username, $page));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function usersCheckFollowingForUser(string $username, string $targetUser): Response {
        return $this->connector->send(new UsersCheckFollowingForUser($username, $targetUser));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListGpgKeysForUser(string $username, ?int $page): Response {
        return $this->connector->send(new UsersListGpgKeysForUser($username, $page));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  string  $subjectType  Identifies which additional information you'd like to receive about the person's hovercard. Can be `organization`, `repository`, `issue`, `pull_request`. **Required** when using `subject_id`.
     * @param  string  $subjectId  Uses the ID for the `subject_type` you specified. **Required** when using `subject_type`.
     */
    public function usersGetContextForUser(string $username, ?string $subjectType, ?string $subjectId): Response {
        return $this->connector->send(new UsersGetContextForUser($username, $subjectType, $subjectId));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListPublicKeysForUser(string $username, ?int $page): Response {
        return $this->connector->send(new UsersListPublicKeysForUser($username, $page));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListSocialAccountsForUser(string $username, ?int $page): Response {
        return $this->connector->send(new UsersListSocialAccountsForUser($username, $page));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function usersListSshSigningKeysForUser(string $username, ?int $page): Response {
        return $this->connector->send(new UsersListSshSigningKeysForUser($username, $page));
    }
}
