<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Gitignore\GitignoreGetAllTemplates;
use Oneduo\GitHubSdk\Requests\Gitignore\GitignoreGetTemplate;
use Saloon\Http\Response;

class Gitignore extends GitHubResource
{
    public function getAllTemplates(): Response
    {
        return $this->connector->send(new GitignoreGetAllTemplates);
    }

    public function getTemplate(string $name): Response
    {
        return $this->connector->send(new GitignoreGetTemplate($name));
    }
}
