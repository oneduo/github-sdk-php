<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\DependencyGraph;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependency-graph/diff-range
 *
 * Gets the diff of the dependency changes between two commits of a repository, based on the changes to
 * the dependency manifests made in those commits.
 */
class DependencyGraphDiffRange extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/dependency-graph/compare/{$this->basehead}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $basehead  The base and head Git revisions to compare. The Git revisions will be resolved to commit SHAs. Named revisions will be resolved to their corresponding HEAD commits, and an appropriate merge base will be determined. This parameter expects the format `{base}...{head}`.
     * @param  null|string  $name  The full path, relative to the repository root, of the dependency manifest file.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $basehead,
        protected ?string $name = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['name' => $this->name]);
    }
}
