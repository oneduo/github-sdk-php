<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Meta\MetaGet;
use Oneduo\GitHubSdk\Requests\Meta\MetaGetAllVersions;
use Oneduo\GitHubSdk\Requests\Meta\MetaGetOctocat;
use Oneduo\GitHubSdk\Requests\Meta\MetaGetZen;
use Oneduo\GitHubSdk\Requests\Meta\MetaRoot;
use Saloon\Http\Response;

class Meta extends GitHubResource
{
    public function root(): Response
    {
        return $this->connector->send(new MetaRoot);
    }

    public function get(): Response
    {
        return $this->connector->send(new MetaGet);
    }

    /**
     * @param  string  $s  The words to show in Octocat's speech bubble
     */
    public function getOctocat(?string $s): Response
    {
        return $this->connector->send(new MetaGetOctocat($s));
    }

    public function getAllVersions(): Response
    {
        return $this->connector->send(new MetaGetAllVersions);
    }

    public function getZen(): Response
    {
        return $this->connector->send(new MetaGetZen);
    }
}
