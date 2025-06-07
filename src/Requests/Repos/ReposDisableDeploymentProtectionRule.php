<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/disable-deployment-protection-rule
 *
 * Disables a custom deployment protection rule for an environment.
 *
 * The authenticated user must have
 * admin or owner permissions to the repository to use this endpoint.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ReposDisableDeploymentProtectionRule extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/deployment_protection_rules/{$this->protectionRuleId}";
    }

    /**
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  int  $protectionRuleId  The unique identifier of the protection rule.
     */
    public function __construct(
        protected string $environmentName,
        protected string $repo,
        protected string $owner,
        protected int $protectionRuleId,
    ) {}
}
