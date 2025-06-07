<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/get-context-for-user
 *
 * Provides hovercard information. You can find out more about someone in relation to their pull
 * requests, issues, repositories, and organizations.
 *
 *   The `subject_type` and `subject_id` parameters
 * provide context for the person's hovercard, which returns more information than without the
 * parameters. For example, if you wanted to find out more about `octocat` who owns the `Spoon-Knife`
 * repository, you would use a `subject_type` value of `repository` and a `subject_id` value of
 * `1300192` (the ID of the `Spoon-Knife` repository).
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `repo` scope to use this endpoint.
 */
class UsersGetContextForUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->username}/hovercard";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  null|string  $subjectType  Identifies which additional information you'd like to receive about the person's hovercard. Can be `organization`, `repository`, `issue`, `pull_request`. **Required** when using `subject_id`.
     * @param  null|string  $subjectId  Uses the ID for the `subject_type` you specified. **Required** when using `subject_type`.
     */
    public function __construct(
        protected string $username,
        protected ?string $subjectType = null,
        protected ?string $subjectId = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['subject_type' => $this->subjectType, 'subject_id' => $this->subjectId]);
    }
}
