<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\CodesOfConduct\CodesOfConductGetAllCodesOfConduct;
use Oneduo\GitHubSdk\Requests\CodesOfConduct\CodesOfConductGetConductCode;
use Saloon\Http\Response;

class CodesOfConduct extends GitHubResource {
    public function codesOfConductGetAllCodesOfConduct(): Response {
        return $this->connector->send(new CodesOfConductGetAllCodesOfConduct);
    }

    public function codesOfConductGetConductCode(string $key): Response {
        return $this->connector->send(new CodesOfConductGetConductCode($key));
    }
}
