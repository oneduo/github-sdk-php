<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\SecurityAdvisories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * security-advisories/list-global-advisories
 *
 * Lists all global security advisories that match the specified parameters. If no other parameters are
 * defined, the request will return only GitHub-reviewed advisories that are not malware.
 *
 * By default,
 * all responses will exclude advisories for malware, because malware are not standard vulnerabilities.
 * To list advisories for malware, you must include the `type` parameter in your request, with the
 * value `malware`. For more information about the different types of security advisories, see "[About
 * the GitHub Advisory
 * database](https://docs.github.com/code-security/security-advisories/global-security-advisories/about-the-github-advisory-database#about-types-of-security-advisories)."
 */
class SecurityAdvisoriesListGlobalAdvisories extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/advisories';
    }

    /**
     * @param  null|string  $ghsaId  If specified, only advisories with this GHSA (GitHub Security Advisory) identifier will be returned.
     * @param  null|string  $type  If specified, only advisories of this type will be returned. By default, a request with no other parameters defined will only return reviewed advisories that are not malware.
     * @param  null|string  $cveId  If specified, only advisories with this CVE (Common Vulnerabilities and Exposures) identifier will be returned.
     * @param  null|string  $ecosystem  If specified, only advisories for these ecosystems will be returned.
     * @param  null|string  $severity  If specified, only advisories with these severities will be returned.
     * @param  null|mixed  $cwes  If specified, only advisories with these Common Weakness Enumerations (CWEs) will be returned.
     *
     * Example: `cwes=79,284,22` or `cwes[]=79&cwes[]=284&cwes[]=22`
     * @param  null|bool  $isWithdrawn  Whether to only return advisories that have been withdrawn.
     * @param  null|mixed  $affects  If specified, only return advisories that affect any of `package` or `package@version`. A maximum of 1000 packages can be specified.
     *                               If the query parameter causes the URL to exceed the maximum URL length supported by your client, you must specify fewer packages.
     *
     * Example: `affects=package1,package2@1.0.0,package3@^2.0.0` or `affects[]=package1&affects[]=package2@1.0.0`
     * @param  null|string  $published  If specified, only return advisories that were published on a date or date range.
     *
     * For more information on the syntax of the date range, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
     * @param  null|string  $updated  If specified, only return advisories that were updated on a date or date range.
     *
     * For more information on the syntax of the date range, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
     * @param  null|string  $modified  If specified, only show advisories that were updated or published on a date or date range.
     *
     * For more information on the syntax of the date range, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
     * @param  null|string  $epssPercentage  If specified, only return advisories that have an EPSS percentage score that matches the provided value.
     *                                       The EPSS percentage represents the likelihood of a CVE being exploited.
     * @param  null|string  $epssPercentile  If specified, only return advisories that have an EPSS percentile score that matches the provided value.
     *                                       The EPSS percentile represents the relative rank of the CVE's likelihood of being exploited compared to other CVEs.
     * @param  null|string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|string  $sort  The property to sort the results by.
     */
    public function __construct(
        protected ?string $ghsaId = null,
        protected ?string $type = null,
        protected ?string $cveId = null,
        protected ?string $ecosystem = null,
        protected ?string $severity = null,
        protected mixed $cwes = null,
        protected ?bool $isWithdrawn = null,
        protected mixed $affects = null,
        protected ?string $published = null,
        protected ?string $updated = null,
        protected ?string $modified = null,
        protected ?string $epssPercentage = null,
        protected ?string $epssPercentile = null,
        protected ?string $before = null,
        protected ?string $direction = null,
        protected ?string $sort = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'ghsa_id' => $this->ghsaId,
            'type' => $this->type,
            'cve_id' => $this->cveId,
            'ecosystem' => $this->ecosystem,
            'severity' => $this->severity,
            'cwes' => $this->cwes,
            'is_withdrawn' => $this->isWithdrawn,
            'affects' => $this->affects,
            'published' => $this->published,
            'updated' => $this->updated,
            'modified' => $this->modified,
            'epss_percentage' => $this->epssPercentage,
            'epss_percentile' => $this->epssPercentile,
            'before' => $this->before,
            'direction' => $this->direction,
            'sort' => $this->sort,
        ]);
    }
}
