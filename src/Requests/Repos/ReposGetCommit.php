<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-commit
 *
 * Returns the contents of a single commit reference. You must have `read` access for the repository to
 * use this endpoint.
 *
 * > [!NOTE]
 * > If there are more than 300 files in the commit diff and the default
 * JSON media type is requested, the response will include pagination link headers for the remaining
 * files, up to a limit of 3000 files. Each page contains the static commit information, and the only
 * changes are to the file listing.
 *
 * This endpoint supports the following custom media types. For more
 * information, see "[Media
 * types](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types)."
 * Pagination query parameters are not supported for these media types.
 *
 * -
 * **`application/vnd.github.diff`**: Returns the diff of the commit. Larger diffs may time out and
 * return a 5xx status code.
 * - **`application/vnd.github.patch`**: Returns the patch of the commit.
 * Diffs with binary data will have no `patch` property. Larger diffs may time out and return a 5xx
 * status code.
 * - **`application/vnd.github.sha`**: Returns the commit's SHA-1 hash. You can use this
 * endpoint to check if a remote reference's SHA-1 hash is the same as your local reference's SHA-1
 * hash by providing the local SHA-1 reference as the ETag.
 *
 * **Signature verification object**
 *
 * The
 * response will include a `verification` object that describes the result of verifying the commit's
 * signature. The following fields are included in the `verification` object:
 *
 * | Name | Type |
 * Description |
 * | ---- | ---- | ----------- |
 * | `verified` | `boolean` | Indicates whether GitHub
 * considers the signature in this commit to be verified. |
 * | `reason` | `string` | The reason for
 * verified value. Possible values and their meanings are enumerated in table below. |
 * | `signature` |
 * `string` | The signature that was extracted from the commit. |
 * | `payload` | `string` | The value
 * that was signed. |
 * | `verified_at` | `string` | The date the signature was verified by GitHub.
 * |
 *
 * These are the possible values for `reason` in the `verification` object:
 *
 * | Value | Description
 * |
 * | ----- | ----------- |
 * | `expired_key` | The key that made the signature is expired. |
 * |
 * `not_signing_key` | The "signing" flag is not among the usage flags in the GPG key that made the
 * signature. |
 * | `gpgverify_error` | There was an error communicating with the signature verification
 * service. |
 * | `gpgverify_unavailable` | The signature verification service is currently unavailable.
 * |
 * | `unsigned` | The object does not include a signature. |
 * | `unknown_signature_type` | A non-PGP
 * signature was found in the commit. |
 * | `no_user` | No user was associated with the `committer` email
 * address in the commit. |
 * | `unverified_email` | The `committer` email address in the commit was
 * associated with a user, but the email address is not verified on their account. |
 * | `bad_email` |
 * The `committer` email address in the commit is not included in the identities of the PGP key that
 * made the signature. |
 * | `unknown_key` | The key that made the signature has not been registered with
 * any user's account. |
 * | `malformed_signature` | There was an error parsing the signature. |
 * |
 * `invalid` | The signature could not be cryptographically verified using the key whose key-id was
 * found in the signature. |
 * | `valid` | None of the above errors applied, so the signature is
 * considered to be verified. |
 */
class ReposGetCommit extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/commits/{$this->ref}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $ref,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
