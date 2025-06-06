<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/compare-commits
 *
 * Compares two commits against one another. You can compare refs (branches or tags) and commit SHAs in
 * the same repository, or you can compare refs and commit SHAs that exist in different repositories
 * within the same repository network, including fork branches. For more information about how to view
 * a repository's network, see "[Understanding connections between
 * repositories](https://docs.github.com/repositories/viewing-activity-and-data-for-your-repository/understanding-connections-between-repositories)."
 *
 * This
 * endpoint is equivalent to running the `git log BASE..HEAD` command, but it returns commits in a
 * different order. The `git log BASE..HEAD` command returns commits in reverse chronological order,
 * whereas the API returns commits in chronological order.
 *
 * This endpoint supports the following custom
 * media types. For more information, see "[Media
 * types](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types)."
 *
 * -
 * **`application/vnd.github.diff`**: Returns the diff of the commit.
 * -
 * **`application/vnd.github.patch`**: Returns the patch of the commit. Diffs with binary data will
 * have no `patch` property.
 *
 * The API response includes details about the files that were changed
 * between the two commits. This includes the status of the change (if a file was added, removed,
 * modified, or renamed), and details of the change itself. For example, files with a `renamed` status
 * have a `previous_filename` field showing the previous filename of the file, and files with a
 * `modified` status have a `patch` field showing the changes made to the file.
 *
 * When calling this
 * endpoint without any paging parameter (`per_page` or `page`), the returned list is limited to 250
 * commits, and the last commit in the list is the most recent of the entire comparison.
 *
 * **Working
 * with large comparisons**
 *
 * To process a response with a large number of commits, use a query
 * parameter (`per_page` or `page`) to paginate the results. When using pagination:
 *
 * - The list of
 * changed files is only shown on the first page of results, and it includes up to 300 changed files
 * for the entire comparison.
 * - The results are returned in chronological order, but the last commit in
 * the returned list may not be the most recent one in the entire set if there are more pages of
 * results.
 *
 * For more information on working with pagination, see "[Using pagination in the REST
 * API](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api)."
 *
 * **Signature
 * verification object**
 *
 * The response will include a `verification` object that describes the result
 * of verifying the commit's signature. The `verification` object includes the following fields:
 *
 * |
 * Name | Type | Description |
 * | ---- | ---- | ----------- |
 * | `verified` | `boolean` | Indicates
 * whether GitHub considers the signature in this commit to be verified. |
 * | `reason` | `string` | The
 * reason for verified value. Possible values and their meanings are enumerated in table below. |
 * |
 * `signature` | `string` | The signature that was extracted from the commit. |
 * | `payload` | `string`
 * | The value that was signed. |
 * | `verified_at` | `string` | The date the signature was verified by
 * GitHub. |
 *
 * These are the possible values for `reason` in the `verification` object:
 *
 * | Value |
 * Description |
 * | ----- | ----------- |
 * | `expired_key` | The key that made the signature is expired.
 * |
 * | `not_signing_key` | The "signing" flag is not among the usage flags in the GPG key that made the
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
class ReposCompareCommits extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/compare/{$this->basehead}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $basehead  The base branch and head branch to compare. This parameter expects the format `BASE...HEAD`. Both must be branch names in `repo`. To compare with a branch that exists in a different repository in the same network as `repo`, the `basehead` parameter expects the format `USERNAME:BASE...USERNAME:HEAD`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $basehead,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
