<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Markdown\MarkdownRender;
use Oneduo\GitHubSdk\Requests\Markdown\MarkdownRenderRaw;
use Saloon\Http\Response;

class Markdown extends GitHubResource {
    public function render(): Response {
        return $this->connector->send(new MarkdownRender);
    }

    public function renderRaw(): Response {
        return $this->connector->send(new MarkdownRenderRaw);
    }
}
