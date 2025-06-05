<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-outside-collaborators
 *
 * List all users who are outside collaborators of an organization.
 */
class OrgsListOutsideCollaborators extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/outside_collaborators";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|string  $filter  Filter the list of outside collaborators. `2fa_disabled` means that only outside collaborators without [two-factor authentication](https://github.com/blog/1614-two-factor-authentication) enabled will be returned. `2fa_insecure` means that only outside collaborators with [insecure 2FA methods](https://docs.github.com/organizations/keeping-your-organization-secure/managing-two-factor-authentication-for-your-organization/requiring-two-factor-authentication-in-your-organization#requiring-secure-methods-of-two-factor-authentication-in-your-organization) will be returned.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?string $filter = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['filter' => $this->filter, 'page' => $this->page]);
    }
}
