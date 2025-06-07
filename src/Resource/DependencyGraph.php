<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\DependencyGraph\DependencyGraphCreateRepositorySnapshot;
use Oneduo\GitHubSdk\Requests\DependencyGraph\DependencyGraphDiffRange;
use Oneduo\GitHubSdk\Requests\DependencyGraph\DependencyGraphExportSbom;
use Saloon\Http\Response;

class DependencyGraph extends GitHubResource
{
    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $basehead  The base and head Git revisions to compare. The Git revisions will be resolved to commit SHAs. Named revisions will be resolved to their corresponding HEAD commits, and an appropriate merge base will be determined. This parameter expects the format `{base}...{head}`.
     * @param  string  $name  The full path, relative to the repository root, of the dependency manifest file.
     */
    public function diffRange(string $owner, string $repo, string $basehead, ?string $name): Response
    {
        return $this->connector->send(new DependencyGraphDiffRange($owner, $repo, $basehead, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function exportSbom(string $owner, string $repo): Response
    {
        return $this->connector->send(new DependencyGraphExportSbom($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createRepositorySnapshot(string $owner, string $repo): Response
    {
        return $this->connector->send(new DependencyGraphCreateRepositorySnapshot($owner, $repo));
    }
}
