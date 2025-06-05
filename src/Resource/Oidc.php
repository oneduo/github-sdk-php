<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Oidc\OidcGetOidcCustomSubTemplateForOrg;
use Oneduo\GitHubSdk\Requests\Oidc\OidcUpdateOidcCustomSubTemplateForOrg;
use Saloon\Http\Response;

class Oidc extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function oidcGetOidcCustomSubTemplateForOrg(string $org): Response {
        return $this->connector->send(new OidcGetOidcCustomSubTemplateForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function oidcUpdateOidcCustomSubTemplateForOrg(string $org): Response {
        return $this->connector->send(new OidcUpdateOidcCustomSubTemplateForOrg($org));
    }
}
