<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Emojis\EmojisGet;
use Saloon\Http\Response;

class Emojis extends GitHubResource
{
    public function get(): Response
    {
        return $this->connector->send(new EmojisGet);
    }
}
