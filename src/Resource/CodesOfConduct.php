<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\CodesOfConduct\CodesOfConductGetAllCodesOfConduct;
use Oneduo\GitHubSdk\Requests\CodesOfConduct\CodesOfConductGetConductCode;
use Saloon\Http\Response;

class CodesOfConduct extends GitHubResource
{
    public function getAllCodesOfConduct(): Response
    {
        return $this->connector->send(new CodesOfConductGetAllCodesOfConduct);
    }

    public function getConductCode(string $key): Response
    {
        return $this->connector->send(new CodesOfConductGetConductCode($key));
    }
}
