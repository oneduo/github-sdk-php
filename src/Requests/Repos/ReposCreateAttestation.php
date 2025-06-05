<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-attestation
 *
 * Store an artifact attestation and associate it with a repository.
 *
 * The authenticated user must have
 * write permission to the repository and, if using a fine-grained access token, the
 * `attestations:write` permission is required.
 *
 * Artifact attestations are meant to be created using
 * the [attest action](https://github.com/actions/attest). For more information, see our guide on
 * [using artifact attestations to establish a build's
 * provenance](https://docs.github.com/actions/security-guides/using-artifact-attestations-to-establish-provenance-for-builds).
 */
class ReposCreateAttestation extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/attestations";
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
