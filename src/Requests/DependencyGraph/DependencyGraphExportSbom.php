<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\DependencyGraph;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependency-graph/export-sbom
 *
 * Exports the software bill of materials (SBOM) for a repository in SPDX JSON format.
 */
class DependencyGraphExportSbom extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/dependency-graph/sbom";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {}
}
