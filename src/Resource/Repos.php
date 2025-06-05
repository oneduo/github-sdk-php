<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Repos\ReposAcceptInvitationForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Repos\ReposAddAppAccessRestrictions;
use Oneduo\GitHubSdk\Requests\Repos\ReposAddCollaborator;
use Oneduo\GitHubSdk\Requests\Repos\ReposAddStatusCheckContexts;
use Oneduo\GitHubSdk\Requests\Repos\ReposAddTeamAccessRestrictions;
use Oneduo\GitHubSdk\Requests\Repos\ReposAddUserAccessRestrictions;
use Oneduo\GitHubSdk\Requests\Repos\ReposCancelPagesDeployment;
use Oneduo\GitHubSdk\Requests\Repos\ReposCheckAutomatedSecurityFixes;
use Oneduo\GitHubSdk\Requests\Repos\ReposCheckCollaborator;
use Oneduo\GitHubSdk\Requests\Repos\ReposCheckPrivateVulnerabilityReporting;
use Oneduo\GitHubSdk\Requests\Repos\ReposCheckVulnerabilityAlerts;
use Oneduo\GitHubSdk\Requests\Repos\ReposCodeownersErrors;
use Oneduo\GitHubSdk\Requests\Repos\ReposCompareCommits;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateAttestation;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateAutolink;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateCommitComment;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateCommitSignatureProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateCommitStatus;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateDeployKey;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateDeployment;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateDeploymentBranchPolicy;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateDeploymentProtectionRule;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateDeploymentStatus;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateDispatchEvent;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateFork;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateInOrg;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateOrgRuleset;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateOrUpdateCustomPropertiesValues;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateOrUpdateEnvironment;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateOrUpdateFileContents;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreatePagesDeployment;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreatePagesSite;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateRelease;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateRepoRuleset;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateTagProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateUsingTemplate;
use Oneduo\GitHubSdk\Requests\Repos\ReposCreateWebhook;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeclineInvitationForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Repos\ReposDelete;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteAccessRestrictions;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteAdminBranchProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteAnEnvironment;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteAutolink;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteBranchProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteCommitComment;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteCommitSignatureProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteDeployKey;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteDeployment;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteDeploymentBranchPolicy;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteFile;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteInvitation;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteOrgRuleset;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeletePagesSite;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeletePullRequestReviewProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteRelease;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteReleaseAsset;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteRepoRuleset;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteTagProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposDeleteWebhook;
use Oneduo\GitHubSdk\Requests\Repos\ReposDisableAutomatedSecurityFixes;
use Oneduo\GitHubSdk\Requests\Repos\ReposDisableDeploymentProtectionRule;
use Oneduo\GitHubSdk\Requests\Repos\ReposDisablePrivateVulnerabilityReporting;
use Oneduo\GitHubSdk\Requests\Repos\ReposDisableVulnerabilityAlerts;
use Oneduo\GitHubSdk\Requests\Repos\ReposDownloadTarballArchive;
use Oneduo\GitHubSdk\Requests\Repos\ReposDownloadZipballArchive;
use Oneduo\GitHubSdk\Requests\Repos\ReposEnableAutomatedSecurityFixes;
use Oneduo\GitHubSdk\Requests\Repos\ReposEnablePrivateVulnerabilityReporting;
use Oneduo\GitHubSdk\Requests\Repos\ReposEnableVulnerabilityAlerts;
use Oneduo\GitHubSdk\Requests\Repos\ReposGenerateReleaseNotes;
use Oneduo\GitHubSdk\Requests\Repos\ReposGet;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetAccessRestrictions;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetAdminBranchProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetAllDeploymentProtectionRules;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetAllEnvironments;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetAllStatusCheckContexts;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetAllTopics;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetAppsWithAccessToProtectedBranch;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetAutolink;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetBranch;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetBranchProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetBranchRules;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetClones;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetCodeFrequencyStats;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetCollaboratorPermissionLevel;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetCombinedStatusForRef;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetCommit;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetCommitActivityStats;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetCommitComment;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetCommitSignatureProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetCommunityProfileMetrics;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetContent;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetContributorsStats;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetCustomDeploymentProtectionRule;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetCustomPropertiesValues;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetDeployKey;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetDeployment;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetDeploymentBranchPolicy;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetDeploymentStatus;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetEnvironment;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetLatestPagesBuild;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetLatestRelease;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetOrgRuleset;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetOrgRulesets;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetOrgRuleSuite;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetOrgRuleSuites;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetPages;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetPagesBuild;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetPagesDeployment;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetPagesHealthCheck;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetParticipationStats;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetPullRequestReviewProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetPunchCardStats;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetReadme;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetReadmeInDirectory;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetRelease;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetReleaseAsset;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetReleaseByTag;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetRepoRuleset;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetRepoRulesetHistory;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetRepoRulesets;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetRepoRulesetVersion;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetRepoRuleSuite;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetRepoRuleSuites;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetStatusChecksProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetTeamsWithAccessToProtectedBranch;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetTopPaths;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetTopReferrers;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetUsersWithAccessToProtectedBranch;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetViews;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetWebhook;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetWebhookConfigForRepo;
use Oneduo\GitHubSdk\Requests\Repos\ReposGetWebhookDelivery;
use Oneduo\GitHubSdk\Requests\Repos\ReposListActivities;
use Oneduo\GitHubSdk\Requests\Repos\ReposListAttestations;
use Oneduo\GitHubSdk\Requests\Repos\ReposListAutolinks;
use Oneduo\GitHubSdk\Requests\Repos\ReposListBranches;
use Oneduo\GitHubSdk\Requests\Repos\ReposListBranchesForHeadCommit;
use Oneduo\GitHubSdk\Requests\Repos\ReposListCollaborators;
use Oneduo\GitHubSdk\Requests\Repos\ReposListCommentsForCommit;
use Oneduo\GitHubSdk\Requests\Repos\ReposListCommitCommentsForRepo;
use Oneduo\GitHubSdk\Requests\Repos\ReposListCommits;
use Oneduo\GitHubSdk\Requests\Repos\ReposListCommitStatusesForRef;
use Oneduo\GitHubSdk\Requests\Repos\ReposListContributors;
use Oneduo\GitHubSdk\Requests\Repos\ReposListCustomDeploymentRuleIntegrations;
use Oneduo\GitHubSdk\Requests\Repos\ReposListDeployKeys;
use Oneduo\GitHubSdk\Requests\Repos\ReposListDeploymentBranchPolicies;
use Oneduo\GitHubSdk\Requests\Repos\ReposListDeployments;
use Oneduo\GitHubSdk\Requests\Repos\ReposListDeploymentStatuses;
use Oneduo\GitHubSdk\Requests\Repos\ReposListForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Repos\ReposListForks;
use Oneduo\GitHubSdk\Requests\Repos\ReposListForOrg;
use Oneduo\GitHubSdk\Requests\Repos\ReposListForUser;
use Oneduo\GitHubSdk\Requests\Repos\ReposListInvitations;
use Oneduo\GitHubSdk\Requests\Repos\ReposListInvitationsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Repos\ReposListLanguages;
use Oneduo\GitHubSdk\Requests\Repos\ReposListPagesBuilds;
use Oneduo\GitHubSdk\Requests\Repos\ReposListPublic;
use Oneduo\GitHubSdk\Requests\Repos\ReposListPullRequestsAssociatedWithCommit;
use Oneduo\GitHubSdk\Requests\Repos\ReposListReleaseAssets;
use Oneduo\GitHubSdk\Requests\Repos\ReposListReleases;
use Oneduo\GitHubSdk\Requests\Repos\ReposListTagProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposListTags;
use Oneduo\GitHubSdk\Requests\Repos\ReposListTeams;
use Oneduo\GitHubSdk\Requests\Repos\ReposListWebhookDeliveries;
use Oneduo\GitHubSdk\Requests\Repos\ReposListWebhooks;
use Oneduo\GitHubSdk\Requests\Repos\ReposMerge;
use Oneduo\GitHubSdk\Requests\Repos\ReposMergeUpstream;
use Oneduo\GitHubSdk\Requests\Repos\ReposPingWebhook;
use Oneduo\GitHubSdk\Requests\Repos\ReposRedeliverWebhookDelivery;
use Oneduo\GitHubSdk\Requests\Repos\ReposRemoveAppAccessRestrictions;
use Oneduo\GitHubSdk\Requests\Repos\ReposRemoveCollaborator;
use Oneduo\GitHubSdk\Requests\Repos\ReposRemoveStatusCheckContexts;
use Oneduo\GitHubSdk\Requests\Repos\ReposRemoveStatusCheckProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposRemoveTeamAccessRestrictions;
use Oneduo\GitHubSdk\Requests\Repos\ReposRemoveUserAccessRestrictions;
use Oneduo\GitHubSdk\Requests\Repos\ReposRenameBranch;
use Oneduo\GitHubSdk\Requests\Repos\ReposReplaceAllTopics;
use Oneduo\GitHubSdk\Requests\Repos\ReposRequestPagesBuild;
use Oneduo\GitHubSdk\Requests\Repos\ReposSetAdminBranchProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposSetAppAccessRestrictions;
use Oneduo\GitHubSdk\Requests\Repos\ReposSetStatusCheckContexts;
use Oneduo\GitHubSdk\Requests\Repos\ReposSetTeamAccessRestrictions;
use Oneduo\GitHubSdk\Requests\Repos\ReposSetUserAccessRestrictions;
use Oneduo\GitHubSdk\Requests\Repos\ReposTestPushWebhook;
use Oneduo\GitHubSdk\Requests\Repos\ReposTransfer;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdate;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateBranchProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateCommitComment;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateDeploymentBranchPolicy;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateInformationAboutPagesSite;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateInvitation;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateOrgRuleset;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdatePullRequestReviewProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateRelease;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateReleaseAsset;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateRepoRuleset;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateStatusCheckProtection;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateWebhook;
use Oneduo\GitHubSdk\Requests\Repos\ReposUpdateWebhookConfigForRepo;
use Oneduo\GitHubSdk\Requests\Repos\ReposUploadReleaseAsset;
use Saloon\Http\Response;

class Repos extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $type  Specifies the types of repositories you want returned.
     * @param  string  $sort  The property to sort the results by.
     * @param  string  $direction  The order to sort by. Default: `asc` when using `full_name`, otherwise `desc`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForOrg(string $org, ?string $type, ?string $sort, ?string $direction, ?int $page): Response {
        return $this->connector->send(new ReposListForOrg($org, $type, $sort, $direction, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createInOrg(string $org): Response {
        return $this->connector->send(new ReposCreateInOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $targets  A comma-separated list of rule targets to filter by.
     *                           If provided, only rulesets that apply to the specified targets will be returned.
     *                           For example, `branch,tag,push`.
     */
    public function getOrgRulesets(string $org, ?int $page, ?string $targets): Response {
        return $this->connector->send(new ReposGetOrgRulesets($org, $page, $targets));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createOrgRuleset(string $org): Response {
        return $this->connector->send(new ReposCreateOrgRuleset($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $ref  The name of the ref. Cannot contain wildcard characters. Optionally prefix with `refs/heads/` to limit to branches or `refs/tags/` to limit to tags. Omit the prefix to search across all refs. When specified, only rule evaluations triggered for this ref will be returned.
     * @param  string  $repositoryName  The name of the repository to filter on.
     * @param  string  $timePeriod  The time period to filter by.
     *
     * For example, `day` will filter for rule suites that occurred in the past 24 hours, and `week` will filter for insights that occurred in the past 7 days (168 hours).
     * @param  string  $actorName  The handle for the GitHub user account to filter on. When specified, only rule evaluations triggered by this actor will be returned.
     * @param  string  $ruleSuiteResult  The rule results to filter on. When specified, only suites with this result will be returned.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getOrgRuleSuites(
        string $org,
        ?string $ref,
        ?string $repositoryName,
        ?string $timePeriod,
        ?string $actorName,
        ?string $ruleSuiteResult,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposGetOrgRuleSuites($org, $ref, $repositoryName, $timePeriod, $actorName, $ruleSuiteResult, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $ruleSuiteId  The unique identifier of the rule suite result.
     *                            To get this ID, you can use [GET /repos/{owner}/{repo}/rulesets/rule-suites](https://docs.github.com/rest/repos/rule-suites#list-repository-rule-suites)
     *                            for repositories and [GET /orgs/{org}/rulesets/rule-suites](https://docs.github.com/rest/orgs/rule-suites#list-organization-rule-suites)
     *                            for organizations.
     */
    public function getOrgRuleSuite(string $org, int $ruleSuiteId): Response {
        return $this->connector->send(new ReposGetOrgRuleSuite($org, $ruleSuiteId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     */
    public function getOrgRuleset(string $org, int $rulesetId): Response {
        return $this->connector->send(new ReposGetOrgRuleset($org, $rulesetId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     */
    public function updateOrgRuleset(string $org, int $rulesetId): Response {
        return $this->connector->send(new ReposUpdateOrgRuleset($org, $rulesetId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     */
    public function deleteOrgRuleset(string $org, int $rulesetId): Response {
        return $this->connector->send(new ReposDeleteOrgRuleset($org, $rulesetId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function get(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGet($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function delete(string $owner, string $repo): Response {
        return $this->connector->send(new ReposDelete($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function update(string $owner, string $repo): Response {
        return $this->connector->send(new ReposUpdate($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $ref  The Git reference for the activities you want to list.
     *
     * The `ref` for a branch can be formatted either as `refs/heads/BRANCH_NAME` or `BRANCH_NAME`, where `BRANCH_NAME` is the name of your branch.
     * @param  string  $actor  The GitHub username to use to filter by the actor who performed the activity.
     * @param  string  $timePeriod  The time period to filter by.
     *
     * For example, `day` will filter for activity that occurred in the past 24 hours, and `week` will filter for activity that occurred in the past 7 days (168 hours).
     * @param  string  $activityType  The activity type to filter by.
     *
     * For example, you can choose to filter by "force_push", to see all force pushes to the repository.
     */
    public function listActivities(
        string $owner,
        string $repo,
        ?string $direction,
        ?string $before,
        ?string $ref,
        ?string $actor,
        ?string $timePeriod,
        ?string $activityType,
    ): Response {
        return $this->connector->send(new ReposListActivities($owner, $repo, $direction, $before, $ref, $actor, $timePeriod, $activityType));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createAttestation(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreateAttestation($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $subjectDigest  The parameter should be set to the attestation's subject's SHA256 digest, in the form `sha256:HEX_DIGEST`.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $predicateType  Optional filter for fetching attestations with a given predicate type.
     *                                 This option accepts `provenance`, `sbom`, or freeform text for custom predicate types.
     */
    public function listAttestations(
        string $owner,
        string $repo,
        string $subjectDigest,
        ?string $before,
        ?string $predicateType,
    ): Response {
        return $this->connector->send(new ReposListAttestations($owner, $repo, $subjectDigest, $before, $predicateType));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function listAutolinks(string $owner, string $repo): Response {
        return $this->connector->send(new ReposListAutolinks($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createAutolink(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreateAutolink($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $autolinkId  The unique identifier of the autolink.
     */
    public function getAutolink(string $owner, string $repo, int $autolinkId): Response {
        return $this->connector->send(new ReposGetAutolink($owner, $repo, $autolinkId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $autolinkId  The unique identifier of the autolink.
     */
    public function deleteAutolink(string $owner, string $repo, int $autolinkId): Response {
        return $this->connector->send(new ReposDeleteAutolink($owner, $repo, $autolinkId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function checkAutomatedSecurityFixes(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCheckAutomatedSecurityFixes($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function enableAutomatedSecurityFixes(string $owner, string $repo): Response {
        return $this->connector->send(new ReposEnableAutomatedSecurityFixes($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function disableAutomatedSecurityFixes(string $owner, string $repo): Response {
        return $this->connector->send(new ReposDisableAutomatedSecurityFixes($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  bool  $protected  Setting to `true` returns only branches protected by branch protections or rulesets. When set to `false`, only unprotected branches are returned. Omitting this parameter returns all branches.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listBranches(string $owner, string $repo, ?bool $protected, ?int $page): Response {
        return $this->connector->send(new ReposListBranches($owner, $repo, $protected, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function getBranch(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposGetBranch($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function getBranchProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposGetBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function updateBranchProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposUpdateBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function deleteBranchProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposDeleteBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function getAdminBranchProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposGetAdminBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function setAdminBranchProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposSetAdminBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function deleteAdminBranchProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposDeleteAdminBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function getPullRequestReviewProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposGetPullRequestReviewProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function deletePullRequestReviewProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposDeletePullRequestReviewProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function updatePullRequestReviewProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposUpdatePullRequestReviewProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function getCommitSignatureProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposGetCommitSignatureProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function createCommitSignatureProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposCreateCommitSignatureProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function deleteCommitSignatureProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposDeleteCommitSignatureProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function getStatusChecksProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposGetStatusChecksProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function removeStatusCheckProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposRemoveStatusCheckProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function updateStatusCheckProtection(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposUpdateStatusCheckProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function getAllStatusCheckContexts(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposGetAllStatusCheckContexts($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function setStatusCheckContexts(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposSetStatusCheckContexts($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function addStatusCheckContexts(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposAddStatusCheckContexts($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function removeStatusCheckContexts(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposRemoveStatusCheckContexts($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function getAccessRestrictions(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposGetAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function deleteAccessRestrictions(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposDeleteAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function getAppsWithAccessToProtectedBranch(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposGetAppsWithAccessToProtectedBranch($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function setAppAccessRestrictions(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposSetAppAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function addAppAccessRestrictions(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposAddAppAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function removeAppAccessRestrictions(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposRemoveAppAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function getTeamsWithAccessToProtectedBranch(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposGetTeamsWithAccessToProtectedBranch($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function setTeamAccessRestrictions(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposSetTeamAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function addTeamAccessRestrictions(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposAddTeamAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function removeTeamAccessRestrictions(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposRemoveTeamAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function getUsersWithAccessToProtectedBranch(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposGetUsersWithAccessToProtectedBranch($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function setUserAccessRestrictions(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposSetUserAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function addUserAccessRestrictions(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposAddUserAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function removeUserAccessRestrictions(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposRemoveUserAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function renameBranch(string $owner, string $repo, string $branch): Response {
        return $this->connector->send(new ReposRenameBranch($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  A branch, tag or commit name used to determine which version of the CODEOWNERS file to use. Default: the repository's default branch (e.g. `main`)
     */
    public function codeownersErrors(string $owner, string $repo, ?string $ref): Response {
        return $this->connector->send(new ReposCodeownersErrors($owner, $repo, $ref));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $affiliation  Filter collaborators returned by their affiliation. `outside` means all outside collaborators of an organization-owned repository. `direct` means all collaborators with permissions to an organization-owned repository, regardless of organization membership status. `all` means all collaborators the authenticated user can see.
     * @param  string  $permission  Filter collaborators by the permissions they have on the repository. If not specified, all collaborators will be returned.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listCollaborators(
        string $owner,
        string $repo,
        ?string $affiliation,
        ?string $permission,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListCollaborators($owner, $repo, $affiliation, $permission, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function checkCollaborator(string $owner, string $repo, string $username): Response {
        return $this->connector->send(new ReposCheckCollaborator($owner, $repo, $username));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function addCollaborator(string $owner, string $repo, string $username): Response {
        return $this->connector->send(new ReposAddCollaborator($owner, $repo, $username));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function removeCollaborator(string $owner, string $repo, string $username): Response {
        return $this->connector->send(new ReposRemoveCollaborator($owner, $repo, $username));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getCollaboratorPermissionLevel(string $owner, string $repo, string $username): Response {
        return $this->connector->send(new ReposGetCollaboratorPermissionLevel($owner, $repo, $username));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listCommitCommentsForRepo(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ReposListCommitCommentsForRepo($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function getCommitComment(string $owner, string $repo, int $commentId): Response {
        return $this->connector->send(new ReposGetCommitComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function deleteCommitComment(string $owner, string $repo, int $commentId): Response {
        return $this->connector->send(new ReposDeleteCommitComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function updateCommitComment(string $owner, string $repo, int $commentId): Response {
        return $this->connector->send(new ReposUpdateCommitComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $sha  SHA or branch to start listing commits from. Default: the repository’s default branch (usually `main`).
     * @param  string  $path  Only commits containing this file path will be returned.
     * @param  string  $author  GitHub username or email address to use to filter by commit author.
     * @param  string  $committer  GitHub username or email address to use to filter by commit committer.
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`. Due to limitations of Git, timestamps must be between 1970-01-01 and 2099-12-31 (inclusive) or unexpected results may be returned.
     * @param  string  $until  Only commits before this date will be returned. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`. Due to limitations of Git, timestamps must be between 1970-01-01 and 2099-12-31 (inclusive) or unexpected results may be returned.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listCommits(
        string $owner,
        string $repo,
        ?string $sha,
        ?string $path,
        ?string $author,
        ?string $committer,
        ?string $since,
        ?string $until,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListCommits($owner, $repo, $sha, $path, $author, $committer, $since, $until, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $commitSha  The SHA of the commit.
     */
    public function listBranchesForHeadCommit(string $owner, string $repo, string $commitSha): Response {
        return $this->connector->send(new ReposListBranchesForHeadCommit($owner, $repo, $commitSha));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $commitSha  The SHA of the commit.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listCommentsForCommit(string $owner, string $repo, string $commitSha, ?int $page): Response {
        return $this->connector->send(new ReposListCommentsForCommit($owner, $repo, $commitSha, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $commitSha  The SHA of the commit.
     */
    public function createCommitComment(string $owner, string $repo, string $commitSha): Response {
        return $this->connector->send(new ReposCreateCommitComment($owner, $repo, $commitSha));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $commitSha  The SHA of the commit.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listPullRequestsAssociatedWithCommit(
        string $owner,
        string $repo,
        string $commitSha,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListPullRequestsAssociatedWithCommit($owner, $repo, $commitSha, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getCommit(string $owner, string $repo, string $ref, ?int $page): Response {
        return $this->connector->send(new ReposGetCommit($owner, $repo, $ref, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getCombinedStatusForRef(string $owner, string $repo, string $ref, ?int $page): Response {
        return $this->connector->send(new ReposGetCombinedStatusForRef($owner, $repo, $ref, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listCommitStatusesForRef(string $owner, string $repo, string $ref, ?int $page): Response {
        return $this->connector->send(new ReposListCommitStatusesForRef($owner, $repo, $ref, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getCommunityProfileMetrics(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetCommunityProfileMetrics($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $basehead  The base branch and head branch to compare. This parameter expects the format `BASE...HEAD`. Both must be branch names in `repo`. To compare with a branch that exists in a different repository in the same network as `repo`, the `basehead` parameter expects the format `USERNAME:BASE...USERNAME:HEAD`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function compareCommits(string $owner, string $repo, string $basehead, ?int $page): Response {
        return $this->connector->send(new ReposCompareCommits($owner, $repo, $basehead, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $path  path parameter
     * @param  string  $ref  The name of the commit/branch/tag. Default: the repository’s default branch.
     */
    public function getContent(string $owner, string $repo, string $path, ?string $ref): Response {
        return $this->connector->send(new ReposGetContent($owner, $repo, $path, $ref));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $path  path parameter
     */
    public function createOrUpdateFileContents(string $owner, string $repo, string $path): Response {
        return $this->connector->send(new ReposCreateOrUpdateFileContents($owner, $repo, $path));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $path  path parameter
     */
    public function deleteFile(string $owner, string $repo, string $path): Response {
        return $this->connector->send(new ReposDeleteFile($owner, $repo, $path));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $anon  Set to `1` or `true` to include anonymous contributors in results.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listContributors(string $owner, string $repo, ?string $anon, ?int $page): Response {
        return $this->connector->send(new ReposListContributors($owner, $repo, $anon, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $sha  The SHA recorded at creation time.
     * @param  string  $ref  The name of the ref. This can be a branch, tag, or SHA.
     * @param  string  $task  The name of the task for the deployment (e.g., `deploy` or `deploy:migrations`).
     * @param  string  $environment  The name of the environment that was deployed to (e.g., `staging` or `production`).
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listDeployments(
        string $owner,
        string $repo,
        ?string $sha,
        ?string $ref,
        ?string $task,
        ?string $environment,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListDeployments($owner, $repo, $sha, $ref, $task, $environment, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createDeployment(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreateDeployment($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $deploymentId  deployment_id parameter
     */
    public function getDeployment(string $owner, string $repo, int $deploymentId): Response {
        return $this->connector->send(new ReposGetDeployment($owner, $repo, $deploymentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $deploymentId  deployment_id parameter
     */
    public function deleteDeployment(string $owner, string $repo, int $deploymentId): Response {
        return $this->connector->send(new ReposDeleteDeployment($owner, $repo, $deploymentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $deploymentId  deployment_id parameter
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listDeploymentStatuses(string $owner, string $repo, int $deploymentId, ?int $page): Response {
        return $this->connector->send(new ReposListDeploymentStatuses($owner, $repo, $deploymentId, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $deploymentId  deployment_id parameter
     */
    public function createDeploymentStatus(string $owner, string $repo, int $deploymentId): Response {
        return $this->connector->send(new ReposCreateDeploymentStatus($owner, $repo, $deploymentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $deploymentId  deployment_id parameter
     */
    public function getDeploymentStatus(string $owner, string $repo, int $deploymentId, int $statusId): Response {
        return $this->connector->send(new ReposGetDeploymentStatus($owner, $repo, $deploymentId, $statusId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createDispatchEvent(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreateDispatchEvent($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getAllEnvironments(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ReposGetAllEnvironments($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function getEnvironment(string $owner, string $repo, string $environmentName): Response {
        return $this->connector->send(new ReposGetEnvironment($owner, $repo, $environmentName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function createOrUpdateEnvironment(string $owner, string $repo, string $environmentName): Response {
        return $this->connector->send(new ReposCreateOrUpdateEnvironment($owner, $repo, $environmentName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function deleteAnEnvironment(string $owner, string $repo, string $environmentName): Response {
        return $this->connector->send(new ReposDeleteAnEnvironment($owner, $repo, $environmentName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listDeploymentBranchPolicies(
        string $owner,
        string $repo,
        string $environmentName,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListDeploymentBranchPolicies($owner, $repo, $environmentName, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function createDeploymentBranchPolicy(string $owner, string $repo, string $environmentName): Response {
        return $this->connector->send(new ReposCreateDeploymentBranchPolicy($owner, $repo, $environmentName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $branchPolicyId  The unique identifier of the branch policy.
     */
    public function getDeploymentBranchPolicy(
        string $owner,
        string $repo,
        string $environmentName,
        int $branchPolicyId,
    ): Response {
        return $this->connector->send(new ReposGetDeploymentBranchPolicy($owner, $repo, $environmentName, $branchPolicyId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $branchPolicyId  The unique identifier of the branch policy.
     */
    public function updateDeploymentBranchPolicy(
        string $owner,
        string $repo,
        string $environmentName,
        int $branchPolicyId,
    ): Response {
        return $this->connector->send(new ReposUpdateDeploymentBranchPolicy($owner, $repo, $environmentName, $branchPolicyId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $branchPolicyId  The unique identifier of the branch policy.
     */
    public function deleteDeploymentBranchPolicy(
        string $owner,
        string $repo,
        string $environmentName,
        int $branchPolicyId,
    ): Response {
        return $this->connector->send(new ReposDeleteDeploymentBranchPolicy($owner, $repo, $environmentName, $branchPolicyId));
    }

    /**
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     */
    public function getAllDeploymentProtectionRules(string $environmentName, string $repo, string $owner): Response {
        return $this->connector->send(new ReposGetAllDeploymentProtectionRules($environmentName, $repo, $owner));
    }

    /**
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     */
    public function createDeploymentProtectionRule(string $environmentName, string $repo, string $owner): Response {
        return $this->connector->send(new ReposCreateDeploymentProtectionRule($environmentName, $repo, $owner));
    }

    /**
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listCustomDeploymentRuleIntegrations(
        string $environmentName,
        string $repo,
        string $owner,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListCustomDeploymentRuleIntegrations($environmentName, $repo, $owner, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $protectionRuleId  The unique identifier of the protection rule.
     */
    public function getCustomDeploymentProtectionRule(
        string $owner,
        string $repo,
        string $environmentName,
        int $protectionRuleId,
    ): Response {
        return $this->connector->send(new ReposGetCustomDeploymentProtectionRule($owner, $repo, $environmentName, $protectionRuleId));
    }

    /**
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  int  $protectionRuleId  The unique identifier of the protection rule.
     */
    public function disableDeploymentProtectionRule(
        string $environmentName,
        string $repo,
        string $owner,
        int $protectionRuleId,
    ): Response {
        return $this->connector->send(new ReposDisableDeploymentProtectionRule($environmentName, $repo, $owner, $protectionRuleId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $sort  The sort order. `stargazers` will sort by star count.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForks(string $owner, string $repo, ?string $sort, ?int $page): Response {
        return $this->connector->send(new ReposListForks($owner, $repo, $sort, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createFork(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreateFork($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listWebhooks(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ReposListWebhooks($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createWebhook(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreateWebhook($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function getWebhook(string $owner, string $repo, int $hookId): Response {
        return $this->connector->send(new ReposGetWebhook($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function deleteWebhook(string $owner, string $repo, int $hookId): Response {
        return $this->connector->send(new ReposDeleteWebhook($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function updateWebhook(string $owner, string $repo, int $hookId): Response {
        return $this->connector->send(new ReposUpdateWebhook($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function getWebhookConfigForRepo(string $owner, string $repo, int $hookId): Response {
        return $this->connector->send(new ReposGetWebhookConfigForRepo($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function updateWebhookConfigForRepo(string $owner, string $repo, int $hookId): Response {
        return $this->connector->send(new ReposUpdateWebhookConfigForRepo($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     * @param  string  $cursor  Used for pagination: the starting delivery from which the page of deliveries is fetched. Refer to the `link` header for the next and previous page cursors.
     */
    public function listWebhookDeliveries(string $owner, string $repo, int $hookId, ?string $cursor): Response {
        return $this->connector->send(new ReposListWebhookDeliveries($owner, $repo, $hookId, $cursor));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function getWebhookDelivery(string $owner, string $repo, int $hookId, int $deliveryId): Response {
        return $this->connector->send(new ReposGetWebhookDelivery($owner, $repo, $hookId, $deliveryId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function redeliverWebhookDelivery(string $owner, string $repo, int $hookId, int $deliveryId): Response {
        return $this->connector->send(new ReposRedeliverWebhookDelivery($owner, $repo, $hookId, $deliveryId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function pingWebhook(string $owner, string $repo, int $hookId): Response {
        return $this->connector->send(new ReposPingWebhook($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function testPushWebhook(string $owner, string $repo, int $hookId): Response {
        return $this->connector->send(new ReposTestPushWebhook($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listInvitations(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ReposListInvitations($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $invitationId  The unique identifier of the invitation.
     */
    public function deleteInvitation(string $owner, string $repo, int $invitationId): Response {
        return $this->connector->send(new ReposDeleteInvitation($owner, $repo, $invitationId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $invitationId  The unique identifier of the invitation.
     */
    public function updateInvitation(string $owner, string $repo, int $invitationId): Response {
        return $this->connector->send(new ReposUpdateInvitation($owner, $repo, $invitationId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listDeployKeys(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ReposListDeployKeys($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createDeployKey(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreateDeployKey($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $keyId  The unique identifier of the key.
     */
    public function getDeployKey(string $owner, string $repo, int $keyId): Response {
        return $this->connector->send(new ReposGetDeployKey($owner, $repo, $keyId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $keyId  The unique identifier of the key.
     */
    public function deleteDeployKey(string $owner, string $repo, int $keyId): Response {
        return $this->connector->send(new ReposDeleteDeployKey($owner, $repo, $keyId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function listLanguages(string $owner, string $repo): Response {
        return $this->connector->send(new ReposListLanguages($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function mergeUpstream(string $owner, string $repo): Response {
        return $this->connector->send(new ReposMergeUpstream($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function merge(string $owner, string $repo): Response {
        return $this->connector->send(new ReposMerge($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getPages(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetPages($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function updateInformationAboutPagesSite(string $owner, string $repo): Response {
        return $this->connector->send(new ReposUpdateInformationAboutPagesSite($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createPagesSite(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreatePagesSite($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function deletePagesSite(string $owner, string $repo): Response {
        return $this->connector->send(new ReposDeletePagesSite($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listPagesBuilds(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ReposListPagesBuilds($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function requestPagesBuild(string $owner, string $repo): Response {
        return $this->connector->send(new ReposRequestPagesBuild($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getLatestPagesBuild(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetLatestPagesBuild($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getPagesBuild(string $owner, string $repo, int $buildId): Response {
        return $this->connector->send(new ReposGetPagesBuild($owner, $repo, $buildId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createPagesDeployment(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreatePagesDeployment($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  mixed  $pagesDeploymentId  The ID of the Pages deployment. You can also give the commit SHA of the deployment.
     */
    public function getPagesDeployment(string $owner, string $repo, mixed $pagesDeploymentId): Response {
        return $this->connector->send(new ReposGetPagesDeployment($owner, $repo, $pagesDeploymentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  mixed  $pagesDeploymentId  The ID of the Pages deployment. You can also give the commit SHA of the deployment.
     */
    public function cancelPagesDeployment(string $owner, string $repo, mixed $pagesDeploymentId): Response {
        return $this->connector->send(new ReposCancelPagesDeployment($owner, $repo, $pagesDeploymentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getPagesHealthCheck(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetPagesHealthCheck($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function checkPrivateVulnerabilityReporting(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCheckPrivateVulnerabilityReporting($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function enablePrivateVulnerabilityReporting(string $owner, string $repo): Response {
        return $this->connector->send(new ReposEnablePrivateVulnerabilityReporting($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function disablePrivateVulnerabilityReporting(string $owner, string $repo): Response {
        return $this->connector->send(new ReposDisablePrivateVulnerabilityReporting($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getCustomPropertiesValues(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetCustomPropertiesValues($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createOrUpdateCustomPropertiesValues(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreateOrUpdateCustomPropertiesValues($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The name of the commit/branch/tag. Default: the repository’s default branch.
     */
    public function getReadme(string $owner, string $repo, ?string $ref): Response {
        return $this->connector->send(new ReposGetReadme($owner, $repo, $ref));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $dir  The alternate path to look for a README file
     * @param  string  $ref  The name of the commit/branch/tag. Default: the repository’s default branch.
     */
    public function getReadmeInDirectory(string $owner, string $repo, string $dir, ?string $ref): Response {
        return $this->connector->send(new ReposGetReadmeInDirectory($owner, $repo, $dir, $ref));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listReleases(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ReposListReleases($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createRelease(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreateRelease($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $assetId  The unique identifier of the asset.
     */
    public function getReleaseAsset(string $owner, string $repo, int $assetId): Response {
        return $this->connector->send(new ReposGetReleaseAsset($owner, $repo, $assetId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $assetId  The unique identifier of the asset.
     */
    public function deleteReleaseAsset(string $owner, string $repo, int $assetId): Response {
        return $this->connector->send(new ReposDeleteReleaseAsset($owner, $repo, $assetId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $assetId  The unique identifier of the asset.
     */
    public function updateReleaseAsset(string $owner, string $repo, int $assetId): Response {
        return $this->connector->send(new ReposUpdateReleaseAsset($owner, $repo, $assetId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function generateReleaseNotes(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGenerateReleaseNotes($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getLatestRelease(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetLatestRelease($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $tag  tag parameter
     */
    public function getReleaseByTag(string $owner, string $repo, string $tag): Response {
        return $this->connector->send(new ReposGetReleaseByTag($owner, $repo, $tag));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $releaseId  The unique identifier of the release.
     */
    public function getRelease(string $owner, string $repo, int $releaseId): Response {
        return $this->connector->send(new ReposGetRelease($owner, $repo, $releaseId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $releaseId  The unique identifier of the release.
     */
    public function deleteRelease(string $owner, string $repo, int $releaseId): Response {
        return $this->connector->send(new ReposDeleteRelease($owner, $repo, $releaseId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $releaseId  The unique identifier of the release.
     */
    public function updateRelease(string $owner, string $repo, int $releaseId): Response {
        return $this->connector->send(new ReposUpdateRelease($owner, $repo, $releaseId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $releaseId  The unique identifier of the release.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listReleaseAssets(string $owner, string $repo, int $releaseId, ?int $page): Response {
        return $this->connector->send(new ReposListReleaseAssets($owner, $repo, $releaseId, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $releaseId  The unique identifier of the release.
     */
    public function uploadReleaseAsset(
        string $owner,
        string $repo,
        int $releaseId,
        string $name,
        ?string $label,
    ): Response {
        return $this->connector->send(new ReposUploadReleaseAsset($owner, $repo, $releaseId, $name, $label));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getBranchRules(string $owner, string $repo, string $branch, ?int $page): Response {
        return $this->connector->send(new ReposGetBranchRules($owner, $repo, $branch, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  bool  $includesParents  Include rulesets configured at higher levels that apply to this repository
     * @param  string  $targets  A comma-separated list of rule targets to filter by.
     *                           If provided, only rulesets that apply to the specified targets will be returned.
     *                           For example, `branch,tag,push`.
     */
    public function getRepoRulesets(
        string $owner,
        string $repo,
        ?int $page,
        ?bool $includesParents,
        ?string $targets,
    ): Response {
        return $this->connector->send(new ReposGetRepoRulesets($owner, $repo, $page, $includesParents, $targets));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createRepoRuleset(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreateRepoRuleset($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The name of the ref. Cannot contain wildcard characters. Optionally prefix with `refs/heads/` to limit to branches or `refs/tags/` to limit to tags. Omit the prefix to search across all refs. When specified, only rule evaluations triggered for this ref will be returned.
     * @param  string  $timePeriod  The time period to filter by.
     *
     * For example, `day` will filter for rule suites that occurred in the past 24 hours, and `week` will filter for insights that occurred in the past 7 days (168 hours).
     * @param  string  $actorName  The handle for the GitHub user account to filter on. When specified, only rule evaluations triggered by this actor will be returned.
     * @param  string  $ruleSuiteResult  The rule results to filter on. When specified, only suites with this result will be returned.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getRepoRuleSuites(
        string $owner,
        string $repo,
        ?string $ref,
        ?string $timePeriod,
        ?string $actorName,
        ?string $ruleSuiteResult,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposGetRepoRuleSuites($owner, $repo, $ref, $timePeriod, $actorName, $ruleSuiteResult, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $ruleSuiteId  The unique identifier of the rule suite result.
     *                            To get this ID, you can use [GET /repos/{owner}/{repo}/rulesets/rule-suites](https://docs.github.com/rest/repos/rule-suites#list-repository-rule-suites)
     *                            for repositories and [GET /orgs/{org}/rulesets/rule-suites](https://docs.github.com/rest/orgs/rule-suites#list-organization-rule-suites)
     *                            for organizations.
     */
    public function getRepoRuleSuite(string $owner, string $repo, int $ruleSuiteId): Response {
        return $this->connector->send(new ReposGetRepoRuleSuite($owner, $repo, $ruleSuiteId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     * @param  bool  $includesParents  Include rulesets configured at higher levels that apply to this repository
     */
    public function getRepoRuleset(string $owner, string $repo, int $rulesetId, ?bool $includesParents): Response {
        return $this->connector->send(new ReposGetRepoRuleset($owner, $repo, $rulesetId, $includesParents));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     */
    public function updateRepoRuleset(string $owner, string $repo, int $rulesetId): Response {
        return $this->connector->send(new ReposUpdateRepoRuleset($owner, $repo, $rulesetId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     */
    public function deleteRepoRuleset(string $owner, string $repo, int $rulesetId): Response {
        return $this->connector->send(new ReposDeleteRepoRuleset($owner, $repo, $rulesetId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getRepoRulesetHistory(string $owner, string $repo, int $rulesetId, ?int $page): Response {
        return $this->connector->send(new ReposGetRepoRulesetHistory($owner, $repo, $rulesetId, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     * @param  int  $versionId  The ID of the version
     */
    public function getRepoRulesetVersion(string $owner, string $repo, int $rulesetId, int $versionId): Response {
        return $this->connector->send(new ReposGetRepoRulesetVersion($owner, $repo, $rulesetId, $versionId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getCodeFrequencyStats(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetCodeFrequencyStats($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getCommitActivityStats(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetCommitActivityStats($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getContributorsStats(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetContributorsStats($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getParticipationStats(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetParticipationStats($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getPunchCardStats(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetPunchCardStats($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createCommitStatus(string $owner, string $repo, string $sha): Response {
        return $this->connector->send(new ReposCreateCommitStatus($owner, $repo, $sha));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listTags(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ReposListTags($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function listTagProtection(string $owner, string $repo): Response {
        return $this->connector->send(new ReposListTagProtection($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createTagProtection(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCreateTagProtection($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $tagProtectionId  The unique identifier of the tag protection.
     */
    public function deleteTagProtection(string $owner, string $repo, int $tagProtectionId): Response {
        return $this->connector->send(new ReposDeleteTagProtection($owner, $repo, $tagProtectionId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function downloadTarballArchive(string $owner, string $repo, string $ref): Response {
        return $this->connector->send(new ReposDownloadTarballArchive($owner, $repo, $ref));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listTeams(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ReposListTeams($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getAllTopics(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ReposGetAllTopics($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function replaceAllTopics(string $owner, string $repo): Response {
        return $this->connector->send(new ReposReplaceAllTopics($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $per  The time frame to display results for.
     */
    public function getClones(string $owner, string $repo, ?string $per): Response {
        return $this->connector->send(new ReposGetClones($owner, $repo, $per));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getTopPaths(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetTopPaths($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getTopReferrers(string $owner, string $repo): Response {
        return $this->connector->send(new ReposGetTopReferrers($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $per  The time frame to display results for.
     */
    public function getViews(string $owner, string $repo, ?string $per): Response {
        return $this->connector->send(new ReposGetViews($owner, $repo, $per));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function transfer(string $owner, string $repo): Response {
        return $this->connector->send(new ReposTransfer($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function checkVulnerabilityAlerts(string $owner, string $repo): Response {
        return $this->connector->send(new ReposCheckVulnerabilityAlerts($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function enableVulnerabilityAlerts(string $owner, string $repo): Response {
        return $this->connector->send(new ReposEnableVulnerabilityAlerts($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function disableVulnerabilityAlerts(string $owner, string $repo): Response {
        return $this->connector->send(new ReposDisableVulnerabilityAlerts($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function downloadZipballArchive(string $owner, string $repo, string $ref): Response {
        return $this->connector->send(new ReposDownloadZipballArchive($owner, $repo, $ref));
    }

    /**
     * @param  string  $templateOwner  The account owner of the template repository. The name is not case sensitive.
     * @param  string  $templateRepo  The name of the template repository without the `.git` extension. The name is not case sensitive.
     */
    public function createUsingTemplate(string $templateOwner, string $templateRepo): Response {
        return $this->connector->send(new ReposCreateUsingTemplate($templateOwner, $templateRepo));
    }

    /**
     * @param  int  $since  A repository ID. Only return repositories with an ID greater than this ID.
     */
    public function listPublic(?int $since): Response {
        return $this->connector->send(new ReposListPublic($since));
    }

    /**
     * @param  string  $visibility  Limit results to repositories with the specified visibility.
     * @param  string  $affiliation  Comma-separated list of values. Can include:
     *                               * `owner`: Repositories that are owned by the authenticated user.
     *                               * `collaborator`: Repositories that the user has been added to as a collaborator.
     *                               * `organization_member`: Repositories that the user has access to through being a member of an organization. This includes every repository on every team that the user is on.
     * @param  string  $type  Limit results to repositories of the specified type. Will cause a `422` error if used in the same request as **visibility** or **affiliation**.
     * @param  string  $sort  The property to sort the results by.
     * @param  string  $direction  The order to sort by. Default: `asc` when using `full_name`, otherwise `desc`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $since  Only show repositories updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $before  Only show repositories updated before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function listForAuthenticatedUser(
        ?string $visibility,
        ?string $affiliation,
        ?string $type,
        ?string $sort,
        ?string $direction,
        ?int $page,
        ?string $since,
        ?string $before,
    ): Response {
        return $this->connector->send(new ReposListForAuthenticatedUser($visibility, $affiliation, $type, $sort, $direction, $page, $since, $before));
    }

    public function createForAuthenticatedUser(): Response {
        return $this->connector->send(new ReposCreateForAuthenticatedUser);
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listInvitationsForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new ReposListInvitationsForAuthenticatedUser($page));
    }

    /**
     * @param  int  $invitationId  The unique identifier of the invitation.
     */
    public function declineInvitationForAuthenticatedUser(int $invitationId): Response {
        return $this->connector->send(new ReposDeclineInvitationForAuthenticatedUser($invitationId));
    }

    /**
     * @param  int  $invitationId  The unique identifier of the invitation.
     */
    public function acceptInvitationForAuthenticatedUser(int $invitationId): Response {
        return $this->connector->send(new ReposAcceptInvitationForAuthenticatedUser($invitationId));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  string  $type  Limit results to repositories of the specified type.
     * @param  string  $sort  The property to sort the results by.
     * @param  string  $direction  The order to sort by. Default: `asc` when using `full_name`, otherwise `desc`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForUser(
        string $username,
        ?string $type,
        ?string $sort,
        ?string $direction,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListForUser($username, $type, $sort, $direction, $page));
    }
}
