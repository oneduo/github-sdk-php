<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk;

class GitHubResource
{
    public function __construct(
        protected GitHubConnector $connector,
    ) {}
}
