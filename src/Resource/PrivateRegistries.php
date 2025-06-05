<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\PrivateRegistries\PrivateRegistriesCreateOrgPrivateRegistry;
use Oneduo\GitHubSdk\Requests\PrivateRegistries\PrivateRegistriesDeleteOrgPrivateRegistry;
use Oneduo\GitHubSdk\Requests\PrivateRegistries\PrivateRegistriesGetOrgPrivateRegistry;
use Oneduo\GitHubSdk\Requests\PrivateRegistries\PrivateRegistriesGetOrgPublicKey;
use Oneduo\GitHubSdk\Requests\PrivateRegistries\PrivateRegistriesListOrgPrivateRegistries;
use Oneduo\GitHubSdk\Requests\PrivateRegistries\PrivateRegistriesUpdateOrgPrivateRegistry;
use Saloon\Http\Response;

class PrivateRegistries extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listOrgPrivateRegistries(string $org, ?int $page): Response {
        return $this->connector->send(new PrivateRegistriesListOrgPrivateRegistries($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createOrgPrivateRegistry(string $org): Response {
        return $this->connector->send(new PrivateRegistriesCreateOrgPrivateRegistry($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getOrgPublicKey(string $org): Response {
        return $this->connector->send(new PrivateRegistriesGetOrgPublicKey($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function getOrgPrivateRegistry(string $org, string $secretName): Response {
        return $this->connector->send(new PrivateRegistriesGetOrgPrivateRegistry($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function deleteOrgPrivateRegistry(string $org, string $secretName): Response {
        return $this->connector->send(new PrivateRegistriesDeleteOrgPrivateRegistry($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function updateOrgPrivateRegistry(string $org, string $secretName): Response {
        return $this->connector->send(new PrivateRegistriesUpdateOrgPrivateRegistry($org, $secretName));
    }
}
