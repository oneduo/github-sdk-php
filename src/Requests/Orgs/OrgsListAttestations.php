<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-attestations
 *
 * List a collection of artifact attestations with a given subject digest that are associated with
 * repositories owned by an organization.
 *
 * The collection of attestations returned by this endpoint is
 * filtered according to the authenticated user's permissions; if the authenticated user cannot read a
 * repository, the attestations associated with that repository will not be included in the response.
 * In addition, when using a fine-grained access token the `attestations:read` permission is
 * required.
 *
 * **Please note:** in order to offer meaningful security benefits, an attestation's
 * signature and timestamps **must** be cryptographically verified, and the identity of the attestation
 * signer **must** be validated. Attestations can be verified using the [GitHub CLI `attestation
 * verify` command](https://cli.github.com/manual/gh_attestation_verify). For more information, see
 * [our guide on how to use artifact attestations to establish a build's
 * provenance](https://docs.github.com/actions/security-guides/using-artifact-attestations-to-establish-provenance-for-builds).
 */
class OrgsListAttestations extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/attestations/{$this->subjectDigest}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $subjectDigest  The parameter should be set to the attestation's subject's SHA256 digest, in the form `sha256:HEX_DIGEST`.
     * @param  null|string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $predicateType  Optional filter for fetching attestations with a given predicate type.
     *                                      This option accepts `provenance`, `sbom`, or freeform text for custom predicate types.
     */
    public function __construct(
        protected string $org,
        protected string $subjectDigest,
        protected ?string $before = null,
        protected ?string $predicateType = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['before' => $this->before, 'predicate_type' => $this->predicateType]);
    }
}
