<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Orgs\ApiInsightsGetRouteStatsByActor;
use Oneduo\GitHubSdk\Requests\Orgs\ApiInsightsGetSubjectStats;
use Oneduo\GitHubSdk\Requests\Orgs\ApiInsightsGetSummaryStats;
use Oneduo\GitHubSdk\Requests\Orgs\ApiInsightsGetSummaryStatsByActor;
use Oneduo\GitHubSdk\Requests\Orgs\ApiInsightsGetSummaryStatsByUser;
use Oneduo\GitHubSdk\Requests\Orgs\ApiInsightsGetTimeStats;
use Oneduo\GitHubSdk\Requests\Orgs\ApiInsightsGetTimeStatsByActor;
use Oneduo\GitHubSdk\Requests\Orgs\ApiInsightsGetTimeStatsByUser;
use Oneduo\GitHubSdk\Requests\Orgs\ApiInsightsGetUserStats;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsAddSecurityManagerTeam;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsAssignTeamToOrgRole;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsAssignUserToOrgRole;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsBlockUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsCancelInvitation;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsCheckBlockedUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsCheckMembershipForUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsCheckPublicMembershipForUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsConvertMemberToOutsideCollaborator;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsCreateInvitation;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsCreateIssueType;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsCreateOrUpdateCustomProperties;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsCreateOrUpdateCustomPropertiesValuesForRepos;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsCreateOrUpdateCustomProperty;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsCreateWebhook;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsDelete;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsDeleteIssueType;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsDeleteWebhook;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsEnableOrDisableSecurityProductOnAllOrgRepos;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsGet;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsGetAllCustomProperties;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsGetCustomProperty;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsGetMembershipForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsGetMembershipForUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsGetOrgRole;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsGetOrgRulesetHistory;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsGetOrgRulesetVersion;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsGetWebhook;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsGetWebhookConfigForOrg;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsGetWebhookDelivery;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsList;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListAppInstallations;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListAttestations;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListBlockedUsers;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListCustomPropertiesValuesForRepos;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListFailedInvitations;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListForUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListInvitationTeams;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListIssueTypes;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListMembers;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListMembershipsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListOrgRoles;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListOrgRoleTeams;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListOrgRoleUsers;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListOutsideCollaborators;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListPatGrantRepositories;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListPatGrantRequestRepositories;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListPatGrantRequests;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListPatGrants;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListPendingInvitations;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListPublicMembers;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListSecurityManagerTeams;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListWebhookDeliveries;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsListWebhooks;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsPingWebhook;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsRedeliverWebhookDelivery;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsRemoveCustomProperty;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsRemoveMember;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsRemoveMembershipForUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsRemoveOutsideCollaborator;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsRemovePublicMembershipForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsRemoveSecurityManagerTeam;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsReviewPatGrantRequest;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsReviewPatGrantRequestsInBulk;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsRevokeAllOrgRolesTeam;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsRevokeAllOrgRolesUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsRevokeOrgRoleTeam;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsRevokeOrgRoleUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsSetMembershipForUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsSetPublicMembershipForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsUnblockUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsUpdate;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsUpdateIssueType;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsUpdateMembershipForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsUpdatePatAccess;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsUpdatePatAccesses;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsUpdateWebhook;
use Oneduo\GitHubSdk\Requests\Orgs\OrgsUpdateWebhookConfigForOrg;
use Saloon\Http\Response;

class Orgs extends GitHubResource
{
    /**
     * @param  int  $since  An organization ID. Only return organizations with an ID greater than this ID.
     */
    public function list(?int $since): Response
    {
        return $this->connector->send(new OrgsList($since));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function get(string $org): Response
    {
        return $this->connector->send(new OrgsGet($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function delete(string $org): Response
    {
        return $this->connector->send(new OrgsDelete($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function update(string $org): Response
    {
        return $this->connector->send(new OrgsUpdate($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $subjectDigest  The parameter should be set to the attestation's subject's SHA256 digest, in the form `sha256:HEX_DIGEST`.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $predicateType  Optional filter for fetching attestations with a given predicate type.
     *                                 This option accepts `provenance`, `sbom`, or freeform text for custom predicate types.
     */
    public function listAttestations(
        string $org,
        string $subjectDigest,
        ?string $before,
        ?string $predicateType,
    ): Response {
        return $this->connector->send(new OrgsListAttestations($org, $subjectDigest, $before, $predicateType));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listBlockedUsers(string $org, ?int $page): Response
    {
        return $this->connector->send(new OrgsListBlockedUsers($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function checkBlockedUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsCheckBlockedUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function blockUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsBlockUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function unblockUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsUnblockUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listFailedInvitations(string $org, ?int $page): Response
    {
        return $this->connector->send(new OrgsListFailedInvitations($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listWebhooks(string $org, ?int $page): Response
    {
        return $this->connector->send(new OrgsListWebhooks($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createWebhook(string $org): Response
    {
        return $this->connector->send(new OrgsCreateWebhook($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function getWebhook(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsGetWebhook($org, $hookId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function deleteWebhook(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsDeleteWebhook($org, $hookId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function updateWebhook(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsUpdateWebhook($org, $hookId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function getWebhookConfigForOrg(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsGetWebhookConfigForOrg($org, $hookId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function updateWebhookConfigForOrg(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsUpdateWebhookConfigForOrg($org, $hookId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     * @param  string  $cursor  Used for pagination: the starting delivery from which the page of deliveries is fetched. Refer to the `link` header for the next and previous page cursors.
     */
    public function listWebhookDeliveries(string $org, int $hookId, ?string $cursor): Response
    {
        return $this->connector->send(new OrgsListWebhookDeliveries($org, $hookId, $cursor));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function getWebhookDelivery(string $org, int $hookId, int $deliveryId): Response
    {
        return $this->connector->send(new OrgsGetWebhookDelivery($org, $hookId, $deliveryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function redeliverWebhookDelivery(string $org, int $hookId, int $deliveryId): Response
    {
        return $this->connector->send(new OrgsRedeliverWebhookDelivery($org, $hookId, $deliveryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function pingWebhook(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsPingWebhook($org, $hookId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $actorType  The type of the actor
     * @param  int  $actorId  The ID of the actor
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $direction  The direction to sort the results by.
     * @param  array  $sort  The property to sort the results by.
     * @param  string  $apiRouteSubstring  Providing a substring will filter results where the API route contains the substring. This is a case-insensitive search.
     */
    public function apiInsightsGetRouteStatsByActor(
        string $org,
        string $actorType,
        int $actorId,
        string $minTimestamp,
        ?string $maxTimestamp,
        ?int $page,
        ?string $direction,
        ?array $sort,
        ?string $apiRouteSubstring,
    ): Response {
        return $this->connector->send(new ApiInsightsGetRouteStatsByActor($org, $actorType, $actorId, $minTimestamp, $maxTimestamp, $page, $direction, $sort, $apiRouteSubstring));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $direction  The direction to sort the results by.
     * @param  array  $sort  The property to sort the results by.
     * @param  string  $subjectNameSubstring  Providing a substring will filter results where the subject name contains the substring. This is a case-insensitive search.
     */
    public function apiInsightsGetSubjectStats(
        string $org,
        string $minTimestamp,
        ?string $maxTimestamp,
        ?int $page,
        ?string $direction,
        ?array $sort,
        ?string $subjectNameSubstring,
    ): Response {
        return $this->connector->send(new ApiInsightsGetSubjectStats($org, $minTimestamp, $maxTimestamp, $page, $direction, $sort, $subjectNameSubstring));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function apiInsightsGetSummaryStats(string $org, string $minTimestamp, ?string $maxTimestamp): Response
    {
        return $this->connector->send(new ApiInsightsGetSummaryStats($org, $minTimestamp, $maxTimestamp));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $userId  The ID of the user to query for stats
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function apiInsightsGetSummaryStatsByUser(
        string $org,
        string $userId,
        string $minTimestamp,
        ?string $maxTimestamp,
    ): Response {
        return $this->connector->send(new ApiInsightsGetSummaryStatsByUser($org, $userId, $minTimestamp, $maxTimestamp));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $actorType  The type of the actor
     * @param  int  $actorId  The ID of the actor
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function apiInsightsGetSummaryStatsByActor(
        string $org,
        string $actorType,
        int $actorId,
        string $minTimestamp,
        ?string $maxTimestamp,
    ): Response {
        return $this->connector->send(new ApiInsightsGetSummaryStatsByActor($org, $actorType, $actorId, $minTimestamp, $maxTimestamp));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $timestampIncrement  The increment of time used to breakdown the query results (5m, 10m, 1h, etc.)
     */
    public function apiInsightsGetTimeStats(
        string $org,
        string $minTimestamp,
        ?string $maxTimestamp,
        string $timestampIncrement,
    ): Response {
        return $this->connector->send(new ApiInsightsGetTimeStats($org, $minTimestamp, $maxTimestamp, $timestampIncrement));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $userId  The ID of the user to query for stats
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $timestampIncrement  The increment of time used to breakdown the query results (5m, 10m, 1h, etc.)
     */
    public function apiInsightsGetTimeStatsByUser(
        string $org,
        string $userId,
        string $minTimestamp,
        ?string $maxTimestamp,
        string $timestampIncrement,
    ): Response {
        return $this->connector->send(new ApiInsightsGetTimeStatsByUser($org, $userId, $minTimestamp, $maxTimestamp, $timestampIncrement));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $actorType  The type of the actor
     * @param  int  $actorId  The ID of the actor
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $timestampIncrement  The increment of time used to breakdown the query results (5m, 10m, 1h, etc.)
     */
    public function apiInsightsGetTimeStatsByActor(
        string $org,
        string $actorType,
        int $actorId,
        string $minTimestamp,
        ?string $maxTimestamp,
        string $timestampIncrement,
    ): Response {
        return $this->connector->send(new ApiInsightsGetTimeStatsByActor($org, $actorType, $actorId, $minTimestamp, $maxTimestamp, $timestampIncrement));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $userId  The ID of the user to query for stats
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $direction  The direction to sort the results by.
     * @param  array  $sort  The property to sort the results by.
     * @param  string  $actorNameSubstring  Providing a substring will filter results where the actor name contains the substring. This is a case-insensitive search.
     */
    public function apiInsightsGetUserStats(
        string $org,
        string $userId,
        string $minTimestamp,
        ?string $maxTimestamp,
        ?int $page,
        ?string $direction,
        ?array $sort,
        ?string $actorNameSubstring,
    ): Response {
        return $this->connector->send(new ApiInsightsGetUserStats($org, $userId, $minTimestamp, $maxTimestamp, $page, $direction, $sort, $actorNameSubstring));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listAppInstallations(string $org, ?int $page): Response
    {
        return $this->connector->send(new OrgsListAppInstallations($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $role  Filter invitations by their member role.
     * @param  string  $invitationSource  Filter invitations by their invitation source.
     */
    public function listPendingInvitations(
        string $org,
        ?int $page,
        ?string $role,
        ?string $invitationSource,
    ): Response {
        return $this->connector->send(new OrgsListPendingInvitations($org, $page, $role, $invitationSource));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createInvitation(string $org): Response
    {
        return $this->connector->send(new OrgsCreateInvitation($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $invitationId  The unique identifier of the invitation.
     */
    public function cancelInvitation(string $org, int $invitationId): Response
    {
        return $this->connector->send(new OrgsCancelInvitation($org, $invitationId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $invitationId  The unique identifier of the invitation.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listInvitationTeams(string $org, int $invitationId, ?int $page): Response
    {
        return $this->connector->send(new OrgsListInvitationTeams($org, $invitationId, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function listIssueTypes(string $org): Response
    {
        return $this->connector->send(new OrgsListIssueTypes($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createIssueType(string $org): Response
    {
        return $this->connector->send(new OrgsCreateIssueType($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $issueTypeId  The unique identifier of the issue type.
     */
    public function updateIssueType(string $org, int $issueTypeId): Response
    {
        return $this->connector->send(new OrgsUpdateIssueType($org, $issueTypeId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $issueTypeId  The unique identifier of the issue type.
     */
    public function deleteIssueType(string $org, int $issueTypeId): Response
    {
        return $this->connector->send(new OrgsDeleteIssueType($org, $issueTypeId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $filter  Filter members returned in the list. `2fa_disabled` means that only members without [two-factor authentication](https://github.com/blog/1614-two-factor-authentication) enabled will be returned. `2fa_insecure` means that only members with [insecure 2FA methods](https://docs.github.com/organizations/keeping-your-organization-secure/managing-two-factor-authentication-for-your-organization/requiring-two-factor-authentication-in-your-organization#requiring-secure-methods-of-two-factor-authentication-in-your-organization) will be returned. These options are only available for organization owners.
     * @param  string  $role  Filter members returned by their role.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listMembers(string $org, ?string $filter, ?string $role, ?int $page): Response
    {
        return $this->connector->send(new OrgsListMembers($org, $filter, $role, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function checkMembershipForUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsCheckMembershipForUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function removeMember(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsRemoveMember($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getMembershipForUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsGetMembershipForUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function setMembershipForUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsSetMembershipForUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function removeMembershipForUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsRemoveMembershipForUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function listOrgRoles(string $org): Response
    {
        return $this->connector->send(new OrgsListOrgRoles($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     */
    public function revokeAllOrgRolesTeam(string $org, string $teamSlug): Response
    {
        return $this->connector->send(new OrgsRevokeAllOrgRolesTeam($org, $teamSlug));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $roleId  The unique identifier of the role.
     */
    public function assignTeamToOrgRole(string $org, string $teamSlug, int $roleId): Response
    {
        return $this->connector->send(new OrgsAssignTeamToOrgRole($org, $teamSlug, $roleId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $roleId  The unique identifier of the role.
     */
    public function revokeOrgRoleTeam(string $org, string $teamSlug, int $roleId): Response
    {
        return $this->connector->send(new OrgsRevokeOrgRoleTeam($org, $teamSlug, $roleId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function revokeAllOrgRolesUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsRevokeAllOrgRolesUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $roleId  The unique identifier of the role.
     */
    public function assignUserToOrgRole(string $org, string $username, int $roleId): Response
    {
        return $this->connector->send(new OrgsAssignUserToOrgRole($org, $username, $roleId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $roleId  The unique identifier of the role.
     */
    public function revokeOrgRoleUser(string $org, string $username, int $roleId): Response
    {
        return $this->connector->send(new OrgsRevokeOrgRoleUser($org, $username, $roleId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $roleId  The unique identifier of the role.
     */
    public function getOrgRole(string $org, int $roleId): Response
    {
        return $this->connector->send(new OrgsGetOrgRole($org, $roleId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $roleId  The unique identifier of the role.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listOrgRoleTeams(string $org, int $roleId, ?int $page): Response
    {
        return $this->connector->send(new OrgsListOrgRoleTeams($org, $roleId, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $roleId  The unique identifier of the role.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listOrgRoleUsers(string $org, int $roleId, ?int $page): Response
    {
        return $this->connector->send(new OrgsListOrgRoleUsers($org, $roleId, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $filter  Filter the list of outside collaborators. `2fa_disabled` means that only outside collaborators without [two-factor authentication](https://github.com/blog/1614-two-factor-authentication) enabled will be returned. `2fa_insecure` means that only outside collaborators with [insecure 2FA methods](https://docs.github.com/organizations/keeping-your-organization-secure/managing-two-factor-authentication-for-your-organization/requiring-two-factor-authentication-in-your-organization#requiring-secure-methods-of-two-factor-authentication-in-your-organization) will be returned.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listOutsideCollaborators(string $org, ?string $filter, ?int $page): Response
    {
        return $this->connector->send(new OrgsListOutsideCollaborators($org, $filter, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function convertMemberToOutsideCollaborator(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsConvertMemberToOutsideCollaborator($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function removeOutsideCollaborator(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsRemoveOutsideCollaborator($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $sort  The property by which to sort the results.
     * @param  string  $direction  The direction to sort the results by.
     * @param  array  $owner  A list of owner usernames to use to filter the results.
     * @param  string  $repository  The name of the repository to use to filter the results.
     * @param  string  $permission  The permission to use to filter the results.
     * @param  string  $lastUsedBefore  Only show fine-grained personal access tokens used before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $lastUsedAfter  Only show fine-grained personal access tokens used after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  array  $tokenId  The ID of the token
     */
    public function listPatGrantRequests(
        string $org,
        ?int $page,
        ?string $sort,
        ?string $direction,
        ?array $owner,
        ?string $repository,
        ?string $permission,
        ?string $lastUsedBefore,
        ?string $lastUsedAfter,
        ?array $tokenId,
    ): Response {
        return $this->connector->send(new OrgsListPatGrantRequests($org, $page, $sort, $direction, $owner, $repository, $permission, $lastUsedBefore, $lastUsedAfter, $tokenId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function reviewPatGrantRequestsInBulk(string $org): Response
    {
        return $this->connector->send(new OrgsReviewPatGrantRequestsInBulk($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $patRequestId  Unique identifier of the request for access via fine-grained personal access token.
     */
    public function reviewPatGrantRequest(string $org, int $patRequestId): Response
    {
        return $this->connector->send(new OrgsReviewPatGrantRequest($org, $patRequestId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $patRequestId  Unique identifier of the request for access via fine-grained personal access token.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listPatGrantRequestRepositories(string $org, int $patRequestId, ?int $page): Response
    {
        return $this->connector->send(new OrgsListPatGrantRequestRepositories($org, $patRequestId, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $sort  The property by which to sort the results.
     * @param  string  $direction  The direction to sort the results by.
     * @param  array  $owner  A list of owner usernames to use to filter the results.
     * @param  string  $repository  The name of the repository to use to filter the results.
     * @param  string  $permission  The permission to use to filter the results.
     * @param  string  $lastUsedBefore  Only show fine-grained personal access tokens used before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $lastUsedAfter  Only show fine-grained personal access tokens used after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  array  $tokenId  The ID of the token
     */
    public function listPatGrants(
        string $org,
        ?int $page,
        ?string $sort,
        ?string $direction,
        ?array $owner,
        ?string $repository,
        ?string $permission,
        ?string $lastUsedBefore,
        ?string $lastUsedAfter,
        ?array $tokenId,
    ): Response {
        return $this->connector->send(new OrgsListPatGrants($org, $page, $sort, $direction, $owner, $repository, $permission, $lastUsedBefore, $lastUsedAfter, $tokenId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function updatePatAccesses(string $org): Response
    {
        return $this->connector->send(new OrgsUpdatePatAccesses($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $patId  The unique identifier of the fine-grained personal access token.
     */
    public function updatePatAccess(string $org, int $patId): Response
    {
        return $this->connector->send(new OrgsUpdatePatAccess($org, $patId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $patId  Unique identifier of the fine-grained personal access token.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listPatGrantRepositories(string $org, int $patId, ?int $page): Response
    {
        return $this->connector->send(new OrgsListPatGrantRepositories($org, $patId, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getAllCustomProperties(string $org): Response
    {
        return $this->connector->send(new OrgsGetAllCustomProperties($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createOrUpdateCustomProperties(string $org): Response
    {
        return $this->connector->send(new OrgsCreateOrUpdateCustomProperties($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $customPropertyName  The custom property name
     */
    public function getCustomProperty(string $org, string $customPropertyName): Response
    {
        return $this->connector->send(new OrgsGetCustomProperty($org, $customPropertyName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $customPropertyName  The custom property name
     */
    public function createOrUpdateCustomProperty(string $org, string $customPropertyName): Response
    {
        return $this->connector->send(new OrgsCreateOrUpdateCustomProperty($org, $customPropertyName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $customPropertyName  The custom property name
     */
    public function removeCustomProperty(string $org, string $customPropertyName): Response
    {
        return $this->connector->send(new OrgsRemoveCustomProperty($org, $customPropertyName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $repositoryQuery  Finds repositories in the organization with a query containing one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching for repositories](https://docs.github.com/articles/searching-for-repositories/)" for a detailed list of qualifiers.
     */
    public function listCustomPropertiesValuesForRepos(string $org, ?int $page, ?string $repositoryQuery): Response
    {
        return $this->connector->send(new OrgsListCustomPropertiesValuesForRepos($org, $page, $repositoryQuery));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createOrUpdateCustomPropertiesValuesForRepos(string $org): Response
    {
        return $this->connector->send(new OrgsCreateOrUpdateCustomPropertiesValuesForRepos($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listPublicMembers(string $org, ?int $page): Response
    {
        return $this->connector->send(new OrgsListPublicMembers($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function checkPublicMembershipForUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsCheckPublicMembershipForUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function setPublicMembershipForAuthenticatedUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsSetPublicMembershipForAuthenticatedUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function removePublicMembershipForAuthenticatedUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsRemovePublicMembershipForAuthenticatedUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getOrgRulesetHistory(string $org, int $rulesetId, ?int $page): Response
    {
        return $this->connector->send(new OrgsGetOrgRulesetHistory($org, $rulesetId, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     * @param  int  $versionId  The ID of the version
     */
    public function getOrgRulesetVersion(string $org, int $rulesetId, int $versionId): Response
    {
        return $this->connector->send(new OrgsGetOrgRulesetVersion($org, $rulesetId, $versionId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function listSecurityManagerTeams(string $org): Response
    {
        return $this->connector->send(new OrgsListSecurityManagerTeams($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     */
    public function addSecurityManagerTeam(string $org, string $teamSlug): Response
    {
        return $this->connector->send(new OrgsAddSecurityManagerTeam($org, $teamSlug));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     */
    public function removeSecurityManagerTeam(string $org, string $teamSlug): Response
    {
        return $this->connector->send(new OrgsRemoveSecurityManagerTeam($org, $teamSlug));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $securityProduct  The security feature to enable or disable.
     * @param  string  $enablement  The action to take.
     *
     * `enable_all` means to enable the specified security feature for all repositories in the organization.
     * `disable_all` means to disable the specified security feature for all repositories in the organization.
     */
    public function enableOrDisableSecurityProductOnAllOrgRepos(
        string $org,
        string $securityProduct,
        string $enablement,
    ): Response {
        return $this->connector->send(new OrgsEnableOrDisableSecurityProductOnAllOrgRepos($org, $securityProduct, $enablement));
    }

    /**
     * @param  string  $state  Indicates the state of the memberships to return. If not specified, the API returns both active and pending memberships.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listMembershipsForAuthenticatedUser(?string $state, ?int $page): Response
    {
        return $this->connector->send(new OrgsListMembershipsForAuthenticatedUser($state, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getMembershipForAuthenticatedUser(string $org): Response
    {
        return $this->connector->send(new OrgsGetMembershipForAuthenticatedUser($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function updateMembershipForAuthenticatedUser(string $org): Response
    {
        return $this->connector->send(new OrgsUpdateMembershipForAuthenticatedUser($org));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForAuthenticatedUser(?int $page): Response
    {
        return $this->connector->send(new OrgsListForAuthenticatedUser($page));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForUser(string $username, ?int $page): Response
    {
        return $this->connector->send(new OrgsListForUser($username, $page));
    }
}
