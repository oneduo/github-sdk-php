<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Interactions\InteractionsGetRestrictionsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Interactions\InteractionsGetRestrictionsForOrg;
use Oneduo\GitHubSdk\Requests\Interactions\InteractionsGetRestrictionsForRepo;
use Oneduo\GitHubSdk\Requests\Interactions\InteractionsRemoveRestrictionsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Interactions\InteractionsRemoveRestrictionsForOrg;
use Oneduo\GitHubSdk\Requests\Interactions\InteractionsRemoveRestrictionsForRepo;
use Oneduo\GitHubSdk\Requests\Interactions\InteractionsSetRestrictionsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Interactions\InteractionsSetRestrictionsForOrg;
use Oneduo\GitHubSdk\Requests\Interactions\InteractionsSetRestrictionsForRepo;
use Saloon\Http\Response;

class Interactions extends GitHubResource
{
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getRestrictionsForOrg(string $org): Response
    {
        return $this->connector->send(new InteractionsGetRestrictionsForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function setRestrictionsForOrg(string $org): Response
    {
        return $this->connector->send(new InteractionsSetRestrictionsForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function removeRestrictionsForOrg(string $org): Response
    {
        return $this->connector->send(new InteractionsRemoveRestrictionsForOrg($org));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getRestrictionsForRepo(string $owner, string $repo): Response
    {
        return $this->connector->send(new InteractionsGetRestrictionsForRepo($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function setRestrictionsForRepo(string $owner, string $repo): Response
    {
        return $this->connector->send(new InteractionsSetRestrictionsForRepo($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function removeRestrictionsForRepo(string $owner, string $repo): Response
    {
        return $this->connector->send(new InteractionsRemoveRestrictionsForRepo($owner, $repo));
    }

    public function getRestrictionsForAuthenticatedUser(): Response
    {
        return $this->connector->send(new InteractionsGetRestrictionsForAuthenticatedUser);
    }

    public function setRestrictionsForAuthenticatedUser(): Response
    {
        return $this->connector->send(new InteractionsSetRestrictionsForAuthenticatedUser);
    }

    public function removeRestrictionsForAuthenticatedUser(): Response
    {
        return $this->connector->send(new InteractionsRemoveRestrictionsForAuthenticatedUser);
    }
}
