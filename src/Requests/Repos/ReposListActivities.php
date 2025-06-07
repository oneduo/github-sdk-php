<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-activities
 *
 * Lists a detailed history of changes to a repository, such as pushes, merges, force pushes, and
 * branch changes, and associates these changes with commits and users.
 *
 * For more information about
 * viewing repository activity,
 * see "[Viewing activity and data for your
 * repository](https://docs.github.com/repositories/viewing-activity-and-data-for-your-repository)."
 */
class ReposListActivities extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/activity";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $ref  The Git reference for the activities you want to list.
     *
     * The `ref` for a branch can be formatted either as `refs/heads/BRANCH_NAME` or `BRANCH_NAME`, where `BRANCH_NAME` is the name of your branch.
     * @param  null|string  $actor  The GitHub username to use to filter by the actor who performed the activity.
     * @param  null|string  $timePeriod  The time period to filter by.
     *
     * For example, `day` will filter for activity that occurred in the past 24 hours, and `week` will filter for activity that occurred in the past 7 days (168 hours).
     * @param  null|string  $activityType  The activity type to filter by.
     *
     * For example, you can choose to filter by "force_push", to see all force pushes to the repository.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $direction = null,
        protected ?string $before = null,
        protected ?string $ref = null,
        protected ?string $actor = null,
        protected ?string $timePeriod = null,
        protected ?string $activityType = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'direction' => $this->direction,
            'before' => $this->before,
            'ref' => $this->ref,
            'actor' => $this->actor,
            'time_period' => $this->timePeriod,
            'activity_type' => $this->activityType,
        ]);
    }
}
