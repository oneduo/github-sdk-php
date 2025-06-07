<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Credentials\CredentialsRevoke;
use Saloon\Http\Response;

class Credentials extends GitHubResource
{
    public function revoke(): Response
    {
        return $this->connector->send(new CredentialsRevoke);
    }
}
