<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Licenses\LicensesGet;
use Oneduo\GitHubSdk\Requests\Licenses\LicensesGetAllCommonlyUsed;
use Oneduo\GitHubSdk\Requests\Licenses\LicensesGetForRepo;
use Saloon\Http\Response;

class Licenses extends GitHubResource {
    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function licensesGetAllCommonlyUsed(?bool $featured, ?int $page): Response {
        return $this->connector->send(new LicensesGetAllCommonlyUsed($featured, $page));
    }

    public function licensesGet(string $license): Response {
        return $this->connector->send(new LicensesGet($license));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The Git reference for the results you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     */
    public function licensesGetForRepo(string $owner, string $repo, ?string $ref): Response {
        return $this->connector->send(new LicensesGetForRepo($owner, $repo, $ref));
    }
}
