<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/delete-codeql-database
 *
 * Deletes a CodeQL database for a language in a repository.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `repo` scope to use this endpoint with private or public repositories, or
 * the `public_repo` scope to use this endpoint with only public repositories.
 */
class CodeScanningDeleteCodeqlDatabase extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/codeql/databases/{$this->language}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $language  The language of the CodeQL database.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $language,
    ) {}
}
