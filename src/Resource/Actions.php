<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Actions\ActionsAddCustomLabelsToSelfHostedRunnerForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsAddCustomLabelsToSelfHostedRunnerForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsAddRepoAccessToSelfHostedRunnerGroupInOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsAddSelectedRepoToOrgSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsAddSelectedRepoToOrgVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsAddSelfHostedRunnerToGroupForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsApproveWorkflowRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCancelWorkflowRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateEnvironmentVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateHostedRunnerForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateOrgVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateOrUpdateEnvironmentSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateOrUpdateOrgSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateOrUpdateRepoSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateRegistrationTokenForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateRegistrationTokenForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateRemoveTokenForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateRemoveTokenForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateRepoVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateSelfHostedRunnerGroupForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsCreateWorkflowDispatch;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteActionsCacheById;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteActionsCacheByKey;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteArtifact;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteEnvironmentSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteEnvironmentVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteHostedRunnerForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteOrgSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteOrgVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteRepoSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteRepoVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteSelfHostedRunnerFromOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteSelfHostedRunnerFromRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteSelfHostedRunnerGroupFromOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteWorkflowRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDeleteWorkflowRunLogs;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDisableSelectedRepositoryGithubActionsOrganization;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDisableWorkflow;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDownloadArtifact;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDownloadJobLogsForWorkflowRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDownloadWorkflowRunAttemptLogs;
use Oneduo\GitHubSdk\Requests\Actions\ActionsDownloadWorkflowRunLogs;
use Oneduo\GitHubSdk\Requests\Actions\ActionsEnableSelectedRepositoryGithubActionsOrganization;
use Oneduo\GitHubSdk\Requests\Actions\ActionsEnableWorkflow;
use Oneduo\GitHubSdk\Requests\Actions\ActionsForceCancelWorkflowRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGenerateRunnerJitconfigForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGenerateRunnerJitconfigForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetActionsCacheList;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetActionsCacheUsage;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetActionsCacheUsageByRepoForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetActionsCacheUsageForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetAllowedActionsOrganization;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetAllowedActionsRepository;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetArtifact;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetCustomOidcSubClaimForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetEnvironmentPublicKey;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetEnvironmentSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetEnvironmentVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetGithubActionsDefaultWorkflowPermissionsOrganization;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetGithubActionsDefaultWorkflowPermissionsRepository;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetGithubActionsPermissionsOrganization;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetGithubActionsPermissionsRepository;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetHostedRunnerForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetHostedRunnersGithubOwnedImagesForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetHostedRunnersLimitsForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetHostedRunnersMachineSpecsForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetHostedRunnersPartnerImagesForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetHostedRunnersPlatformsForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetJobForWorkflowRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetOrgPublicKey;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetOrgSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetOrgVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetPendingDeploymentsForRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetRepoPublicKey;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetRepoSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetRepoVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetReviewsForRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetSelfHostedRunnerForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetSelfHostedRunnerForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetSelfHostedRunnerGroupForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetWorkflow;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetWorkflowAccessToRepository;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetWorkflowRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetWorkflowRunAttempt;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetWorkflowRunUsage;
use Oneduo\GitHubSdk\Requests\Actions\ActionsGetWorkflowUsage;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListArtifactsForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListEnvironmentSecrets;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListEnvironmentVariables;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListGithubHostedRunnersInGroupForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListHostedRunnersForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListJobsForWorkflowRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListJobsForWorkflowRunAttempt;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListLabelsForSelfHostedRunnerForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListLabelsForSelfHostedRunnerForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListOrgSecrets;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListOrgVariables;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListRepoAccessToSelfHostedRunnerGroupInOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListRepoOrganizationSecrets;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListRepoOrganizationVariables;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListRepoSecrets;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListRepoVariables;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListRepoWorkflows;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListRunnerApplicationsForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListRunnerApplicationsForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListSelectedReposForOrgSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListSelectedReposForOrgVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListSelectedRepositoriesEnabledGithubActionsOrganization;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListSelfHostedRunnerGroupsForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListSelfHostedRunnersForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListSelfHostedRunnersForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListSelfHostedRunnersInGroupForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListWorkflowRunArtifacts;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListWorkflowRuns;
use Oneduo\GitHubSdk\Requests\Actions\ActionsListWorkflowRunsForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsRemoveAllCustomLabelsFromSelfHostedRunnerForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsRemoveAllCustomLabelsFromSelfHostedRunnerForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsRemoveCustomLabelFromSelfHostedRunnerForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsRemoveCustomLabelFromSelfHostedRunnerForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsRemoveRepoAccessToSelfHostedRunnerGroupInOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsRemoveSelectedRepoFromOrgSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsRemoveSelectedRepoFromOrgVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsRemoveSelfHostedRunnerFromGroupForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsReRunJobForWorkflowRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsReRunWorkflow;
use Oneduo\GitHubSdk\Requests\Actions\ActionsReRunWorkflowFailedJobs;
use Oneduo\GitHubSdk\Requests\Actions\ActionsReviewCustomGatesForRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsReviewPendingDeploymentsForRun;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetAllowedActionsOrganization;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetAllowedActionsRepository;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetCustomLabelsForSelfHostedRunnerForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetCustomLabelsForSelfHostedRunnerForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetCustomOidcSubClaimForRepo;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetGithubActionsDefaultWorkflowPermissionsOrganization;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetGithubActionsDefaultWorkflowPermissionsRepository;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetGithubActionsPermissionsOrganization;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetGithubActionsPermissionsRepository;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetRepoAccessToSelfHostedRunnerGroupInOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetSelectedReposForOrgSecret;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetSelectedReposForOrgVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetSelectedRepositoriesEnabledGithubActionsOrganization;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetSelfHostedRunnersInGroupForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsSetWorkflowAccessToRepository;
use Oneduo\GitHubSdk\Requests\Actions\ActionsUpdateEnvironmentVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsUpdateHostedRunnerForOrg;
use Oneduo\GitHubSdk\Requests\Actions\ActionsUpdateOrgVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsUpdateRepoVariable;
use Oneduo\GitHubSdk\Requests\Actions\ActionsUpdateSelfHostedRunnerGroupForOrg;
use Saloon\Http\Response;

class Actions extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getActionsCacheUsageForOrg(string $org): Response {
        return $this->connector->send(new ActionsGetActionsCacheUsageForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getActionsCacheUsageByRepoForOrg(string $org, ?int $page): Response {
        return $this->connector->send(new ActionsGetActionsCacheUsageByRepoForOrg($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listHostedRunnersForOrg(string $org, ?int $page): Response {
        return $this->connector->send(new ActionsListHostedRunnersForOrg($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createHostedRunnerForOrg(string $org): Response {
        return $this->connector->send(new ActionsCreateHostedRunnerForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getHostedRunnersGithubOwnedImagesForOrg(string $org): Response {
        return $this->connector->send(new ActionsGetHostedRunnersGithubOwnedImagesForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getHostedRunnersPartnerImagesForOrg(string $org): Response {
        return $this->connector->send(new ActionsGetHostedRunnersPartnerImagesForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getHostedRunnersLimitsForOrg(string $org): Response {
        return $this->connector->send(new ActionsGetHostedRunnersLimitsForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getHostedRunnersMachineSpecsForOrg(string $org): Response {
        return $this->connector->send(new ActionsGetHostedRunnersMachineSpecsForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getHostedRunnersPlatformsForOrg(string $org): Response {
        return $this->connector->send(new ActionsGetHostedRunnersPlatformsForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hostedRunnerId  Unique identifier of the GitHub-hosted runner.
     */
    public function getHostedRunnerForOrg(string $org, int $hostedRunnerId): Response {
        return $this->connector->send(new ActionsGetHostedRunnerForOrg($org, $hostedRunnerId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hostedRunnerId  Unique identifier of the GitHub-hosted runner.
     */
    public function deleteHostedRunnerForOrg(string $org, int $hostedRunnerId): Response {
        return $this->connector->send(new ActionsDeleteHostedRunnerForOrg($org, $hostedRunnerId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hostedRunnerId  Unique identifier of the GitHub-hosted runner.
     */
    public function updateHostedRunnerForOrg(string $org, int $hostedRunnerId): Response {
        return $this->connector->send(new ActionsUpdateHostedRunnerForOrg($org, $hostedRunnerId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getGithubActionsPermissionsOrganization(string $org): Response {
        return $this->connector->send(new ActionsGetGithubActionsPermissionsOrganization($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function setGithubActionsPermissionsOrganization(string $org): Response {
        return $this->connector->send(new ActionsSetGithubActionsPermissionsOrganization($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listSelectedRepositoriesEnabledGithubActionsOrganization(string $org, ?int $page): Response {
        return $this->connector->send(new ActionsListSelectedRepositoriesEnabledGithubActionsOrganization($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function setSelectedRepositoriesEnabledGithubActionsOrganization(string $org): Response {
        return $this->connector->send(new ActionsSetSelectedRepositoriesEnabledGithubActionsOrganization($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $repositoryId  The unique identifier of the repository.
     */
    public function enableSelectedRepositoryGithubActionsOrganization(string $org, int $repositoryId): Response {
        return $this->connector->send(new ActionsEnableSelectedRepositoryGithubActionsOrganization($org, $repositoryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $repositoryId  The unique identifier of the repository.
     */
    public function disableSelectedRepositoryGithubActionsOrganization(string $org, int $repositoryId): Response {
        return $this->connector->send(new ActionsDisableSelectedRepositoryGithubActionsOrganization($org, $repositoryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getAllowedActionsOrganization(string $org): Response {
        return $this->connector->send(new ActionsGetAllowedActionsOrganization($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function setAllowedActionsOrganization(string $org): Response {
        return $this->connector->send(new ActionsSetAllowedActionsOrganization($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getGithubActionsDefaultWorkflowPermissionsOrganization(string $org): Response {
        return $this->connector->send(new ActionsGetGithubActionsDefaultWorkflowPermissionsOrganization($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function setGithubActionsDefaultWorkflowPermissionsOrganization(string $org): Response {
        return $this->connector->send(new ActionsSetGithubActionsDefaultWorkflowPermissionsOrganization($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $visibleToRepository  Only return runner groups that are allowed to be used by this repository.
     */
    public function listSelfHostedRunnerGroupsForOrg(
        string $org,
        ?int $page,
        ?string $visibleToRepository,
    ): Response {
        return $this->connector->send(new ActionsListSelfHostedRunnerGroupsForOrg($org, $page, $visibleToRepository));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createSelfHostedRunnerGroupForOrg(string $org): Response {
        return $this->connector->send(new ActionsCreateSelfHostedRunnerGroupForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     */
    public function getSelfHostedRunnerGroupForOrg(string $org, int $runnerGroupId): Response {
        return $this->connector->send(new ActionsGetSelfHostedRunnerGroupForOrg($org, $runnerGroupId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     */
    public function deleteSelfHostedRunnerGroupFromOrg(string $org, int $runnerGroupId): Response {
        return $this->connector->send(new ActionsDeleteSelfHostedRunnerGroupFromOrg($org, $runnerGroupId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     */
    public function updateSelfHostedRunnerGroupForOrg(string $org, int $runnerGroupId): Response {
        return $this->connector->send(new ActionsUpdateSelfHostedRunnerGroupForOrg($org, $runnerGroupId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listGithubHostedRunnersInGroupForOrg(string $org, int $runnerGroupId, ?int $page): Response {
        return $this->connector->send(new ActionsListGithubHostedRunnersInGroupForOrg($org, $runnerGroupId, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listRepoAccessToSelfHostedRunnerGroupInOrg(
        string $org,
        int $runnerGroupId,
        ?int $page,
    ): Response {
        return $this->connector->send(new ActionsListRepoAccessToSelfHostedRunnerGroupInOrg($org, $runnerGroupId, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     */
    public function setRepoAccessToSelfHostedRunnerGroupInOrg(string $org, int $runnerGroupId): Response {
        return $this->connector->send(new ActionsSetRepoAccessToSelfHostedRunnerGroupInOrg($org, $runnerGroupId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     * @param  int  $repositoryId  The unique identifier of the repository.
     */
    public function addRepoAccessToSelfHostedRunnerGroupInOrg(
        string $org,
        int $runnerGroupId,
        int $repositoryId,
    ): Response {
        return $this->connector->send(new ActionsAddRepoAccessToSelfHostedRunnerGroupInOrg($org, $runnerGroupId, $repositoryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     * @param  int  $repositoryId  The unique identifier of the repository.
     */
    public function removeRepoAccessToSelfHostedRunnerGroupInOrg(
        string $org,
        int $runnerGroupId,
        int $repositoryId,
    ): Response {
        return $this->connector->send(new ActionsRemoveRepoAccessToSelfHostedRunnerGroupInOrg($org, $runnerGroupId, $repositoryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listSelfHostedRunnersInGroupForOrg(string $org, int $runnerGroupId, ?int $page): Response {
        return $this->connector->send(new ActionsListSelfHostedRunnersInGroupForOrg($org, $runnerGroupId, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     */
    public function setSelfHostedRunnersInGroupForOrg(string $org, int $runnerGroupId): Response {
        return $this->connector->send(new ActionsSetSelfHostedRunnersInGroupForOrg($org, $runnerGroupId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function addSelfHostedRunnerToGroupForOrg(string $org, int $runnerGroupId, int $runnerId): Response {
        return $this->connector->send(new ActionsAddSelfHostedRunnerToGroupForOrg($org, $runnerGroupId, $runnerId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function removeSelfHostedRunnerFromGroupForOrg(
        string $org,
        int $runnerGroupId,
        int $runnerId,
    ): Response {
        return $this->connector->send(new ActionsRemoveSelfHostedRunnerFromGroupForOrg($org, $runnerGroupId, $runnerId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $name  The name of a self-hosted runner.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listSelfHostedRunnersForOrg(string $org, ?string $name, ?int $page): Response {
        return $this->connector->send(new ActionsListSelfHostedRunnersForOrg($org, $name, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function listRunnerApplicationsForOrg(string $org): Response {
        return $this->connector->send(new ActionsListRunnerApplicationsForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function generateRunnerJitconfigForOrg(string $org): Response {
        return $this->connector->send(new ActionsGenerateRunnerJitconfigForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createRegistrationTokenForOrg(string $org): Response {
        return $this->connector->send(new ActionsCreateRegistrationTokenForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createRemoveTokenForOrg(string $org): Response {
        return $this->connector->send(new ActionsCreateRemoveTokenForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function getSelfHostedRunnerForOrg(string $org, int $runnerId): Response {
        return $this->connector->send(new ActionsGetSelfHostedRunnerForOrg($org, $runnerId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function deleteSelfHostedRunnerFromOrg(string $org, int $runnerId): Response {
        return $this->connector->send(new ActionsDeleteSelfHostedRunnerFromOrg($org, $runnerId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function listLabelsForSelfHostedRunnerForOrg(string $org, int $runnerId): Response {
        return $this->connector->send(new ActionsListLabelsForSelfHostedRunnerForOrg($org, $runnerId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function setCustomLabelsForSelfHostedRunnerForOrg(string $org, int $runnerId): Response {
        return $this->connector->send(new ActionsSetCustomLabelsForSelfHostedRunnerForOrg($org, $runnerId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function addCustomLabelsToSelfHostedRunnerForOrg(string $org, int $runnerId): Response {
        return $this->connector->send(new ActionsAddCustomLabelsToSelfHostedRunnerForOrg($org, $runnerId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function removeAllCustomLabelsFromSelfHostedRunnerForOrg(string $org, int $runnerId): Response {
        return $this->connector->send(new ActionsRemoveAllCustomLabelsFromSelfHostedRunnerForOrg($org, $runnerId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     * @param  string  $name  The name of a self-hosted runner's custom label.
     */
    public function removeCustomLabelFromSelfHostedRunnerForOrg(
        string $org,
        int $runnerId,
        string $name,
    ): Response {
        return $this->connector->send(new ActionsRemoveCustomLabelFromSelfHostedRunnerForOrg($org, $runnerId, $name));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listOrgSecrets(string $org, ?int $page): Response {
        return $this->connector->send(new ActionsListOrgSecrets($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getOrgPublicKey(string $org): Response {
        return $this->connector->send(new ActionsGetOrgPublicKey($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function getOrgSecret(string $org, string $secretName): Response {
        return $this->connector->send(new ActionsGetOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function createOrUpdateOrgSecret(string $org, string $secretName): Response {
        return $this->connector->send(new ActionsCreateOrUpdateOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function deleteOrgSecret(string $org, string $secretName): Response {
        return $this->connector->send(new ActionsDeleteOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listSelectedReposForOrgSecret(string $org, string $secretName, ?int $page): Response {
        return $this->connector->send(new ActionsListSelectedReposForOrgSecret($org, $secretName, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function setSelectedReposForOrgSecret(string $org, string $secretName): Response {
        return $this->connector->send(new ActionsSetSelectedReposForOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function addSelectedRepoToOrgSecret(string $org, string $secretName, int $repositoryId): Response {
        return $this->connector->send(new ActionsAddSelectedRepoToOrgSecret($org, $secretName, $repositoryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function removeSelectedRepoFromOrgSecret(string $org, string $secretName, int $repositoryId): Response {
        return $this->connector->send(new ActionsRemoveSelectedRepoFromOrgSecret($org, $secretName, $repositoryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listOrgVariables(string $org, ?int $page): Response {
        return $this->connector->send(new ActionsListOrgVariables($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createOrgVariable(string $org): Response {
        return $this->connector->send(new ActionsCreateOrgVariable($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function getOrgVariable(string $org, string $name): Response {
        return $this->connector->send(new ActionsGetOrgVariable($org, $name));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function deleteOrgVariable(string $org, string $name): Response {
        return $this->connector->send(new ActionsDeleteOrgVariable($org, $name));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function updateOrgVariable(string $org, string $name): Response {
        return $this->connector->send(new ActionsUpdateOrgVariable($org, $name));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listSelectedReposForOrgVariable(string $org, string $name, ?int $page): Response {
        return $this->connector->send(new ActionsListSelectedReposForOrgVariable($org, $name, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function setSelectedReposForOrgVariable(string $org, string $name): Response {
        return $this->connector->send(new ActionsSetSelectedReposForOrgVariable($org, $name));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function addSelectedRepoToOrgVariable(string $org, string $name, int $repositoryId): Response {
        return $this->connector->send(new ActionsAddSelectedRepoToOrgVariable($org, $name, $repositoryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function removeSelectedRepoFromOrgVariable(string $org, string $name, int $repositoryId): Response {
        return $this->connector->send(new ActionsRemoveSelectedRepoFromOrgVariable($org, $name, $repositoryId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $name  The name field of an artifact. When specified, only artifacts with this name will be returned.
     */
    public function listArtifactsForRepo(string $owner, string $repo, ?int $page, ?string $name): Response {
        return $this->connector->send(new ActionsListArtifactsForRepo($owner, $repo, $page, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $artifactId  The unique identifier of the artifact.
     */
    public function getArtifact(string $owner, string $repo, int $artifactId): Response {
        return $this->connector->send(new ActionsGetArtifact($owner, $repo, $artifactId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $artifactId  The unique identifier of the artifact.
     */
    public function deleteArtifact(string $owner, string $repo, int $artifactId): Response {
        return $this->connector->send(new ActionsDeleteArtifact($owner, $repo, $artifactId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $artifactId  The unique identifier of the artifact.
     */
    public function downloadArtifact(
        string $owner,
        string $repo,
        int $artifactId,
        string $archiveFormat,
    ): Response {
        return $this->connector->send(new ActionsDownloadArtifact($owner, $repo, $artifactId, $archiveFormat));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getActionsCacheUsage(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsGetActionsCacheUsage($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $ref  The full Git reference for narrowing down the cache. The `ref` for a branch should be formatted as `refs/heads/<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     * @param  string  $key  An explicit key or prefix for identifying the cache
     * @param  string  $sort  The property to sort the results by. `created_at` means when the cache was created. `last_accessed_at` means when the cache was last accessed. `size_in_bytes` is the size of the cache in bytes.
     * @param  string  $direction  The direction to sort the results by.
     */
    public function getActionsCacheList(
        string $owner,
        string $repo,
        ?int $page,
        ?string $ref,
        ?string $key,
        ?string $sort,
        ?string $direction,
    ): Response {
        return $this->connector->send(new ActionsGetActionsCacheList($owner, $repo, $page, $ref, $key, $sort, $direction));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $key  A key for identifying the cache.
     * @param  string  $ref  The full Git reference for narrowing down the cache. The `ref` for a branch should be formatted as `refs/heads/<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     */
    public function deleteActionsCacheByKey(string $owner, string $repo, string $key, ?string $ref): Response {
        return $this->connector->send(new ActionsDeleteActionsCacheByKey($owner, $repo, $key, $ref));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $cacheId  The unique identifier of the GitHub Actions cache.
     */
    public function deleteActionsCacheById(string $owner, string $repo, int $cacheId): Response {
        return $this->connector->send(new ActionsDeleteActionsCacheById($owner, $repo, $cacheId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $jobId  The unique identifier of the job.
     */
    public function getJobForWorkflowRun(string $owner, string $repo, int $jobId): Response {
        return $this->connector->send(new ActionsGetJobForWorkflowRun($owner, $repo, $jobId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $jobId  The unique identifier of the job.
     */
    public function downloadJobLogsForWorkflowRun(string $owner, string $repo, int $jobId): Response {
        return $this->connector->send(new ActionsDownloadJobLogsForWorkflowRun($owner, $repo, $jobId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $jobId  The unique identifier of the job.
     */
    public function reRunJobForWorkflowRun(string $owner, string $repo, int $jobId): Response {
        return $this->connector->send(new ActionsReRunJobForWorkflowRun($owner, $repo, $jobId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getCustomOidcSubClaimForRepo(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsGetCustomOidcSubClaimForRepo($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function setCustomOidcSubClaimForRepo(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsSetCustomOidcSubClaimForRepo($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listRepoOrganizationSecrets(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ActionsListRepoOrganizationSecrets($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listRepoOrganizationVariables(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ActionsListRepoOrganizationVariables($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getGithubActionsPermissionsRepository(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsGetGithubActionsPermissionsRepository($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function setGithubActionsPermissionsRepository(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsSetGithubActionsPermissionsRepository($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getWorkflowAccessToRepository(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsGetWorkflowAccessToRepository($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function setWorkflowAccessToRepository(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsSetWorkflowAccessToRepository($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getAllowedActionsRepository(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsGetAllowedActionsRepository($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function setAllowedActionsRepository(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsSetAllowedActionsRepository($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getGithubActionsDefaultWorkflowPermissionsRepository(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsGetGithubActionsDefaultWorkflowPermissionsRepository($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function setGithubActionsDefaultWorkflowPermissionsRepository(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsSetGithubActionsDefaultWorkflowPermissionsRepository($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $name  The name of a self-hosted runner.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listSelfHostedRunnersForRepo(string $owner, string $repo, ?string $name, ?int $page): Response {
        return $this->connector->send(new ActionsListSelfHostedRunnersForRepo($owner, $repo, $name, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function listRunnerApplicationsForRepo(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsListRunnerApplicationsForRepo($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function generateRunnerJitconfigForRepo(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsGenerateRunnerJitconfigForRepo($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createRegistrationTokenForRepo(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsCreateRegistrationTokenForRepo($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createRemoveTokenForRepo(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsCreateRemoveTokenForRepo($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function getSelfHostedRunnerForRepo(string $owner, string $repo, int $runnerId): Response {
        return $this->connector->send(new ActionsGetSelfHostedRunnerForRepo($owner, $repo, $runnerId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function deleteSelfHostedRunnerFromRepo(string $owner, string $repo, int $runnerId): Response {
        return $this->connector->send(new ActionsDeleteSelfHostedRunnerFromRepo($owner, $repo, $runnerId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function listLabelsForSelfHostedRunnerForRepo(string $owner, string $repo, int $runnerId): Response {
        return $this->connector->send(new ActionsListLabelsForSelfHostedRunnerForRepo($owner, $repo, $runnerId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function setCustomLabelsForSelfHostedRunnerForRepo(
        string $owner,
        string $repo,
        int $runnerId,
    ): Response {
        return $this->connector->send(new ActionsSetCustomLabelsForSelfHostedRunnerForRepo($owner, $repo, $runnerId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function addCustomLabelsToSelfHostedRunnerForRepo(string $owner, string $repo, int $runnerId): Response {
        return $this->connector->send(new ActionsAddCustomLabelsToSelfHostedRunnerForRepo($owner, $repo, $runnerId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function removeAllCustomLabelsFromSelfHostedRunnerForRepo(
        string $owner,
        string $repo,
        int $runnerId,
    ): Response {
        return $this->connector->send(new ActionsRemoveAllCustomLabelsFromSelfHostedRunnerForRepo($owner, $repo, $runnerId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     * @param  string  $name  The name of a self-hosted runner's custom label.
     */
    public function removeCustomLabelFromSelfHostedRunnerForRepo(
        string $owner,
        string $repo,
        int $runnerId,
        string $name,
    ): Response {
        return $this->connector->send(new ActionsRemoveCustomLabelFromSelfHostedRunnerForRepo($owner, $repo, $runnerId, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $actor  Returns someone's workflow runs. Use the login for the user who created the `push` associated with the check suite or workflow run.
     * @param  string  $branch  Returns workflow runs associated with a branch. Use the name of the branch of the `push`.
     * @param  string  $event  Returns workflow run triggered by the event you specify. For example, `push`, `pull_request` or `issue`. For more information, see "[Events that trigger workflows](https://docs.github.com/actions/automating-your-workflow-with-github-actions/events-that-trigger-workflows)."
     * @param  string  $status  Returns workflow runs with the check run `status` or `conclusion` that you specify. For example, a conclusion can be `success` or a status can be `in_progress`. Only GitHub Actions can set a status of `waiting`, `pending`, or `requested`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $created  Returns workflow runs created within the given date-time range. For more information on the syntax, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
     * @param  bool  $excludePullRequests  If `true` pull requests are omitted from the response (empty array).
     * @param  int  $checkSuiteId  Returns workflow runs with the `check_suite_id` that you specify.
     * @param  string  $headSha  Only returns workflow runs that are associated with the specified `head_sha`.
     */
    public function listWorkflowRunsForRepo(
        string $owner,
        string $repo,
        ?string $actor,
        ?string $branch,
        ?string $event,
        ?string $status,
        ?int $page,
        ?string $created,
        ?bool $excludePullRequests,
        ?int $checkSuiteId,
        ?string $headSha,
    ): Response {
        return $this->connector->send(new ActionsListWorkflowRunsForRepo($owner, $repo, $actor, $branch, $event, $status, $page, $created, $excludePullRequests, $checkSuiteId, $headSha));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     * @param  bool  $excludePullRequests  If `true` pull requests are omitted from the response (empty array).
     */
    public function getWorkflowRun(string $owner, string $repo, int $runId, ?bool $excludePullRequests): Response {
        return $this->connector->send(new ActionsGetWorkflowRun($owner, $repo, $runId, $excludePullRequests));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function deleteWorkflowRun(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsDeleteWorkflowRun($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function getReviewsForRun(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsGetReviewsForRun($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function approveWorkflowRun(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsApproveWorkflowRun($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $name  The name field of an artifact. When specified, only artifacts with this name will be returned.
     */
    public function listWorkflowRunArtifacts(
        string $owner,
        string $repo,
        int $runId,
        ?int $page,
        ?string $name,
    ): Response {
        return $this->connector->send(new ActionsListWorkflowRunArtifacts($owner, $repo, $runId, $page, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     * @param  int  $attemptNumber  The attempt number of the workflow run.
     * @param  bool  $excludePullRequests  If `true` pull requests are omitted from the response (empty array).
     */
    public function getWorkflowRunAttempt(
        string $owner,
        string $repo,
        int $runId,
        int $attemptNumber,
        ?bool $excludePullRequests,
    ): Response {
        return $this->connector->send(new ActionsGetWorkflowRunAttempt($owner, $repo, $runId, $attemptNumber, $excludePullRequests));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     * @param  int  $attemptNumber  The attempt number of the workflow run.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listJobsForWorkflowRunAttempt(
        string $owner,
        string $repo,
        int $runId,
        int $attemptNumber,
        ?int $page,
    ): Response {
        return $this->connector->send(new ActionsListJobsForWorkflowRunAttempt($owner, $repo, $runId, $attemptNumber, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     * @param  int  $attemptNumber  The attempt number of the workflow run.
     */
    public function downloadWorkflowRunAttemptLogs(
        string $owner,
        string $repo,
        int $runId,
        int $attemptNumber,
    ): Response {
        return $this->connector->send(new ActionsDownloadWorkflowRunAttemptLogs($owner, $repo, $runId, $attemptNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function cancelWorkflowRun(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsCancelWorkflowRun($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function reviewCustomGatesForRun(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsReviewCustomGatesForRun($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function forceCancelWorkflowRun(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsForceCancelWorkflowRun($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     * @param  string  $filter  Filters jobs by their `completed_at` timestamp. `latest` returns jobs from the most recent execution of the workflow run. `all` returns all jobs for a workflow run, including from old executions of the workflow run.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listJobsForWorkflowRun(
        string $owner,
        string $repo,
        int $runId,
        ?string $filter,
        ?int $page,
    ): Response {
        return $this->connector->send(new ActionsListJobsForWorkflowRun($owner, $repo, $runId, $filter, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function downloadWorkflowRunLogs(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsDownloadWorkflowRunLogs($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function deleteWorkflowRunLogs(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsDeleteWorkflowRunLogs($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function getPendingDeploymentsForRun(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsGetPendingDeploymentsForRun($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function reviewPendingDeploymentsForRun(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsReviewPendingDeploymentsForRun($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function reRunWorkflow(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsReRunWorkflow($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function reRunWorkflowFailedJobs(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsReRunWorkflowFailedJobs($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function getWorkflowRunUsage(string $owner, string $repo, int $runId): Response {
        return $this->connector->send(new ActionsGetWorkflowRunUsage($owner, $repo, $runId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listRepoSecrets(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ActionsListRepoSecrets($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getRepoPublicKey(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsGetRepoPublicKey($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function getRepoSecret(string $owner, string $repo, string $secretName): Response {
        return $this->connector->send(new ActionsGetRepoSecret($owner, $repo, $secretName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function createOrUpdateRepoSecret(string $owner, string $repo, string $secretName): Response {
        return $this->connector->send(new ActionsCreateOrUpdateRepoSecret($owner, $repo, $secretName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function deleteRepoSecret(string $owner, string $repo, string $secretName): Response {
        return $this->connector->send(new ActionsDeleteRepoSecret($owner, $repo, $secretName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listRepoVariables(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ActionsListRepoVariables($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createRepoVariable(string $owner, string $repo): Response {
        return $this->connector->send(new ActionsCreateRepoVariable($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function getRepoVariable(string $owner, string $repo, string $name): Response {
        return $this->connector->send(new ActionsGetRepoVariable($owner, $repo, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function deleteRepoVariable(string $owner, string $repo, string $name): Response {
        return $this->connector->send(new ActionsDeleteRepoVariable($owner, $repo, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function updateRepoVariable(string $owner, string $repo, string $name): Response {
        return $this->connector->send(new ActionsUpdateRepoVariable($owner, $repo, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listRepoWorkflows(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new ActionsListRepoWorkflows($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  mixed  $workflowId  The ID of the workflow. You can also pass the workflow file name as a string.
     */
    public function getWorkflow(string $owner, string $repo, mixed $workflowId): Response {
        return $this->connector->send(new ActionsGetWorkflow($owner, $repo, $workflowId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  mixed  $workflowId  The ID of the workflow. You can also pass the workflow file name as a string.
     */
    public function disableWorkflow(string $owner, string $repo, mixed $workflowId): Response {
        return $this->connector->send(new ActionsDisableWorkflow($owner, $repo, $workflowId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  mixed  $workflowId  The ID of the workflow. You can also pass the workflow file name as a string.
     */
    public function createWorkflowDispatch(string $owner, string $repo, mixed $workflowId): Response {
        return $this->connector->send(new ActionsCreateWorkflowDispatch($owner, $repo, $workflowId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  mixed  $workflowId  The ID of the workflow. You can also pass the workflow file name as a string.
     */
    public function enableWorkflow(string $owner, string $repo, mixed $workflowId): Response {
        return $this->connector->send(new ActionsEnableWorkflow($owner, $repo, $workflowId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  mixed  $workflowId  The ID of the workflow. You can also pass the workflow file name as a string.
     * @param  string  $actor  Returns someone's workflow runs. Use the login for the user who created the `push` associated with the check suite or workflow run.
     * @param  string  $branch  Returns workflow runs associated with a branch. Use the name of the branch of the `push`.
     * @param  string  $event  Returns workflow run triggered by the event you specify. For example, `push`, `pull_request` or `issue`. For more information, see "[Events that trigger workflows](https://docs.github.com/actions/automating-your-workflow-with-github-actions/events-that-trigger-workflows)."
     * @param  string  $status  Returns workflow runs with the check run `status` or `conclusion` that you specify. For example, a conclusion can be `success` or a status can be `in_progress`. Only GitHub Actions can set a status of `waiting`, `pending`, or `requested`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $created  Returns workflow runs created within the given date-time range. For more information on the syntax, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
     * @param  bool  $excludePullRequests  If `true` pull requests are omitted from the response (empty array).
     * @param  int  $checkSuiteId  Returns workflow runs with the `check_suite_id` that you specify.
     * @param  string  $headSha  Only returns workflow runs that are associated with the specified `head_sha`.
     */
    public function listWorkflowRuns(
        string $owner,
        string $repo,
        mixed $workflowId,
        ?string $actor,
        ?string $branch,
        ?string $event,
        ?string $status,
        ?int $page,
        ?string $created,
        ?bool $excludePullRequests,
        ?int $checkSuiteId,
        ?string $headSha,
    ): Response {
        return $this->connector->send(new ActionsListWorkflowRuns($owner, $repo, $workflowId, $actor, $branch, $event, $status, $page, $created, $excludePullRequests, $checkSuiteId, $headSha));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  mixed  $workflowId  The ID of the workflow. You can also pass the workflow file name as a string.
     */
    public function getWorkflowUsage(string $owner, string $repo, mixed $workflowId): Response {
        return $this->connector->send(new ActionsGetWorkflowUsage($owner, $repo, $workflowId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listEnvironmentSecrets(
        string $owner,
        string $repo,
        string $environmentName,
        ?int $page,
    ): Response {
        return $this->connector->send(new ActionsListEnvironmentSecrets($owner, $repo, $environmentName, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function getEnvironmentPublicKey(string $owner, string $repo, string $environmentName): Response {
        return $this->connector->send(new ActionsGetEnvironmentPublicKey($owner, $repo, $environmentName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $secretName  The name of the secret.
     */
    public function getEnvironmentSecret(
        string $owner,
        string $repo,
        string $environmentName,
        string $secretName,
    ): Response {
        return $this->connector->send(new ActionsGetEnvironmentSecret($owner, $repo, $environmentName, $secretName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $secretName  The name of the secret.
     */
    public function createOrUpdateEnvironmentSecret(
        string $owner,
        string $repo,
        string $environmentName,
        string $secretName,
    ): Response {
        return $this->connector->send(new ActionsCreateOrUpdateEnvironmentSecret($owner, $repo, $environmentName, $secretName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $secretName  The name of the secret.
     */
    public function deleteEnvironmentSecret(
        string $owner,
        string $repo,
        string $environmentName,
        string $secretName,
    ): Response {
        return $this->connector->send(new ActionsDeleteEnvironmentSecret($owner, $repo, $environmentName, $secretName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listEnvironmentVariables(
        string $owner,
        string $repo,
        string $environmentName,
        ?int $page,
    ): Response {
        return $this->connector->send(new ActionsListEnvironmentVariables($owner, $repo, $environmentName, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function createEnvironmentVariable(string $owner, string $repo, string $environmentName): Response {
        return $this->connector->send(new ActionsCreateEnvironmentVariable($owner, $repo, $environmentName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $name  The name of the variable.
     */
    public function getEnvironmentVariable(
        string $owner,
        string $repo,
        string $environmentName,
        string $name,
    ): Response {
        return $this->connector->send(new ActionsGetEnvironmentVariable($owner, $repo, $environmentName, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function deleteEnvironmentVariable(
        string $owner,
        string $repo,
        string $name,
        string $environmentName,
    ): Response {
        return $this->connector->send(new ActionsDeleteEnvironmentVariable($owner, $repo, $name, $environmentName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function updateEnvironmentVariable(
        string $owner,
        string $repo,
        string $name,
        string $environmentName,
    ): Response {
        return $this->connector->send(new ActionsUpdateEnvironmentVariable($owner, $repo, $name, $environmentName));
    }
}
