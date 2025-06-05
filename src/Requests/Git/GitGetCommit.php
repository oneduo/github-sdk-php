<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Git;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * git/get-commit
 *
 * Gets a Git [commit object](https://git-scm.com/book/en/v2/Git-Internals-Git-Objects).
 *
 * To get the
 * contents of a commit, see "[Get a commit](/rest/commits/commits#get-a-commit)."
 *
 * **Signature
 * verification object**
 *
 * The response will include a `verification` object that describes the result
 * of verifying the commit's signature. The following fields are included in the `verification`
 * object:
 *
 * | Name | Type | Description |
 * | ---- | ---- | ----------- |
 * | `verified` | `boolean` |
 * Indicates whether GitHub considers the signature in this commit to be verified. |
 * | `reason` |
 * `string` | The reason for verified value. Possible values and their meanings are enumerated in the
 * table below. |
 * | `signature` | `string` | The signature that was extracted from the commit. |
 * |
 * `payload` | `string` | The value that was signed. |
 * | `verified_at` | `string` | The date the
 * signature was verified by GitHub. |
 *
 * These are the possible values for `reason` in the
 * `verification` object:
 *
 * | Value | Description |
 * | ----- | ----------- |
 * | `expired_key` | The key
 * that made the signature is expired. |
 * | `not_signing_key` | The "signing" flag is not among the
 * usage flags in the GPG key that made the signature. |
 * | `gpgverify_error` | There was an error
 * communicating with the signature verification service. |
 * | `gpgverify_unavailable` | The signature
 * verification service is currently unavailable. |
 * | `unsigned` | The object does not include a
 * signature. |
 * | `unknown_signature_type` | A non-PGP signature was found in the commit. |
 * | `no_user`
 * | No user was associated with the `committer` email address in the commit. |
 * | `unverified_email` |
 * The `committer` email address in the commit was associated with a user, but the email address is not
 * verified on their account. |
 * | `bad_email` | The `committer` email address in the commit is not
 * included in the identities of the PGP key that made the signature. |
 * | `unknown_key` | The key that
 * made the signature has not been registered with any user's account. |
 * | `malformed_signature` |
 * There was an error parsing the signature. |
 * | `invalid` | The signature could not be
 * cryptographically verified using the key whose key-id was found in the signature. |
 * | `valid` | None
 * of the above errors applied, so the signature is considered to be verified. |
 */
class GitGetCommit extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/git/commits/{$this->commitSha}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $commitSha  The SHA of the commit.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $commitSha,
    ) {}
}
