<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Checks\ChecksCreate;
use Oneduo\GitHubSdk\Requests\Checks\ChecksCreateSuite;
use Oneduo\GitHubSdk\Requests\Checks\ChecksGet;
use Oneduo\GitHubSdk\Requests\Checks\ChecksGetSuite;
use Oneduo\GitHubSdk\Requests\Checks\ChecksListAnnotations;
use Oneduo\GitHubSdk\Requests\Checks\ChecksListForRef;
use Oneduo\GitHubSdk\Requests\Checks\ChecksListForSuite;
use Oneduo\GitHubSdk\Requests\Checks\ChecksListSuitesForRef;
use Oneduo\GitHubSdk\Requests\Checks\ChecksRerequestRun;
use Oneduo\GitHubSdk\Requests\Checks\ChecksRerequestSuite;
use Oneduo\GitHubSdk\Requests\Checks\ChecksSetSuitesPreferences;
use Oneduo\GitHubSdk\Requests\Checks\ChecksUpdate;
use Saloon\Http\Response;

class Checks extends GitHubResource {
    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function create(string $owner, string $repo): Response {
        return $this->connector->send(new ChecksCreate($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $checkRunId  The unique identifier of the check run.
     */
    public function get(string $owner, string $repo, int $checkRunId): Response {
        return $this->connector->send(new ChecksGet($owner, $repo, $checkRunId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $checkRunId  The unique identifier of the check run.
     */
    public function update(string $owner, string $repo, int $checkRunId): Response {
        return $this->connector->send(new ChecksUpdate($owner, $repo, $checkRunId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $checkRunId  The unique identifier of the check run.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listAnnotations(string $owner, string $repo, int $checkRunId, ?int $page): Response {
        return $this->connector->send(new ChecksListAnnotations($owner, $repo, $checkRunId, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $checkRunId  The unique identifier of the check run.
     */
    public function rerequestRun(string $owner, string $repo, int $checkRunId): Response {
        return $this->connector->send(new ChecksRerequestRun($owner, $repo, $checkRunId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createSuite(string $owner, string $repo): Response {
        return $this->connector->send(new ChecksCreateSuite($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function setSuitesPreferences(string $owner, string $repo): Response {
        return $this->connector->send(new ChecksSetSuitesPreferences($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $checkSuiteId  The unique identifier of the check suite.
     */
    public function getSuite(string $owner, string $repo, int $checkSuiteId): Response {
        return $this->connector->send(new ChecksGetSuite($owner, $repo, $checkSuiteId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $checkSuiteId  The unique identifier of the check suite.
     * @param  string  $checkName  Returns check runs with the specified `name`.
     * @param  string  $status  Returns check runs with the specified `status`.
     * @param  string  $filter  Filters check runs by their `completed_at` timestamp. `latest` returns the most recent check runs.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForSuite(
        string $owner,
        string $repo,
        int $checkSuiteId,
        ?string $checkName,
        ?string $status,
        ?string $filter,
        ?int $page,
    ): Response {
        return $this->connector->send(new ChecksListForSuite($owner, $repo, $checkSuiteId, $checkName, $status, $filter, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $checkSuiteId  The unique identifier of the check suite.
     */
    public function rerequestSuite(string $owner, string $repo, int $checkSuiteId): Response {
        return $this->connector->send(new ChecksRerequestSuite($owner, $repo, $checkSuiteId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  string  $checkName  Returns check runs with the specified `name`.
     * @param  string  $status  Returns check runs with the specified `status`.
     * @param  string  $filter  Filters check runs by their `completed_at` timestamp. `latest` returns the most recent check runs.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForRef(
        string $owner,
        string $repo,
        string $ref,
        ?string $checkName,
        ?string $status,
        ?string $filter,
        ?int $page,
        ?int $appId,
    ): Response {
        return $this->connector->send(new ChecksListForRef($owner, $repo, $ref, $checkName, $status, $filter, $page, $appId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  int  $appId  Filters check suites by GitHub App `id`.
     * @param  string  $checkName  Returns check runs with the specified `name`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listSuitesForRef(
        string $owner,
        string $repo,
        string $ref,
        ?int $appId,
        ?string $checkName,
        ?int $page,
    ): Response {
        return $this->connector->send(new ChecksListSuitesForRef($owner, $repo, $ref, $appId, $checkName, $page));
    }
}
