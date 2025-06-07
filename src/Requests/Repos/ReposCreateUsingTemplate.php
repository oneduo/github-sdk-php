<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-using-template
 *
 * Creates a new repository using a repository template. Use the `template_owner` and `template_repo`
 * route parameters to specify the repository to use as the template. If the repository is not public,
 * the authenticated user must own or be a member of an organization that owns the repository. To check
 * if a repository is available to use as a template, get the repository's information using the [Get a
 * repository](https://docs.github.com/rest/repos/repos#get-a-repository) endpoint and check that the
 * `is_template` key is `true`.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `public_repo` or `repo` scope to create a public repository, and `repo` scope to create a private
 * repository.
 */
class ReposCreateUsingTemplate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->templateOwner}/{$this->templateRepo}/generate";
    }

    /**
     * @param  string  $templateOwner  The account owner of the template repository. The name is not case sensitive.
     * @param  string  $templateRepo  The name of the template repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $templateOwner,
        protected string $templateRepo,
    ) {}
}
