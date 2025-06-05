<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Apps\AppsAddRepoToInstallationForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Apps\AppsCheckToken;
use Oneduo\GitHubSdk\Requests\Apps\AppsCreateFromManifest;
use Oneduo\GitHubSdk\Requests\Apps\AppsCreateInstallationAccessToken;
use Oneduo\GitHubSdk\Requests\Apps\AppsDeleteAuthorization;
use Oneduo\GitHubSdk\Requests\Apps\AppsDeleteInstallation;
use Oneduo\GitHubSdk\Requests\Apps\AppsDeleteToken;
use Oneduo\GitHubSdk\Requests\Apps\AppsGetAuthenticated;
use Oneduo\GitHubSdk\Requests\Apps\AppsGetBySlug;
use Oneduo\GitHubSdk\Requests\Apps\AppsGetInstallation;
use Oneduo\GitHubSdk\Requests\Apps\AppsGetOrgInstallation;
use Oneduo\GitHubSdk\Requests\Apps\AppsGetRepoInstallation;
use Oneduo\GitHubSdk\Requests\Apps\AppsGetSubscriptionPlanForAccount;
use Oneduo\GitHubSdk\Requests\Apps\AppsGetSubscriptionPlanForAccountStubbed;
use Oneduo\GitHubSdk\Requests\Apps\AppsGetUserInstallation;
use Oneduo\GitHubSdk\Requests\Apps\AppsGetWebhookConfigForApp;
use Oneduo\GitHubSdk\Requests\Apps\AppsGetWebhookDelivery;
use Oneduo\GitHubSdk\Requests\Apps\AppsListAccountsForPlan;
use Oneduo\GitHubSdk\Requests\Apps\AppsListAccountsForPlanStubbed;
use Oneduo\GitHubSdk\Requests\Apps\AppsListInstallationReposForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Apps\AppsListInstallationRequestsForAuthenticatedApp;
use Oneduo\GitHubSdk\Requests\Apps\AppsListInstallations;
use Oneduo\GitHubSdk\Requests\Apps\AppsListInstallationsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Apps\AppsListPlans;
use Oneduo\GitHubSdk\Requests\Apps\AppsListPlansStubbed;
use Oneduo\GitHubSdk\Requests\Apps\AppsListReposAccessibleToInstallation;
use Oneduo\GitHubSdk\Requests\Apps\AppsListSubscriptionsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Apps\AppsListSubscriptionsForAuthenticatedUserStubbed;
use Oneduo\GitHubSdk\Requests\Apps\AppsListWebhookDeliveries;
use Oneduo\GitHubSdk\Requests\Apps\AppsRedeliverWebhookDelivery;
use Oneduo\GitHubSdk\Requests\Apps\AppsRemoveRepoFromInstallationForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Apps\AppsResetToken;
use Oneduo\GitHubSdk\Requests\Apps\AppsRevokeInstallationAccessToken;
use Oneduo\GitHubSdk\Requests\Apps\AppsScopeToken;
use Oneduo\GitHubSdk\Requests\Apps\AppsSuspendInstallation;
use Oneduo\GitHubSdk\Requests\Apps\AppsUnsuspendInstallation;
use Oneduo\GitHubSdk\Requests\Apps\AppsUpdateWebhookConfigForApp;
use Saloon\Http\Response;

class Apps extends GitHubResource {
    public function GetAuthenticated(): Response {
        return $this->connector->send(new AppsGetAuthenticated);
    }

    public function CreateFromManifest(string $code): Response {
        return $this->connector->send(new AppsCreateFromManifest($code));
    }

    public function GetWebhookConfigForApp(): Response {
        return $this->connector->send(new AppsGetWebhookConfigForApp);
    }

    public function UpdateWebhookConfigForApp(): Response {
        return $this->connector->send(new AppsUpdateWebhookConfigForApp);
    }

    /**
     * @param  string  $cursor  Used for pagination: the starting delivery from which the page of deliveries is fetched. Refer to the `link` header for the next and previous page cursors.
     */
    public function ListWebhookDeliveries(?string $cursor): Response {
        return $this->connector->send(new AppsListWebhookDeliveries($cursor));
    }

    public function GetWebhookDelivery(int $deliveryId): Response {
        return $this->connector->send(new AppsGetWebhookDelivery($deliveryId));
    }

    public function RedeliverWebhookDelivery(int $deliveryId): Response {
        return $this->connector->send(new AppsRedeliverWebhookDelivery($deliveryId));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function ListInstallationRequestsForAuthenticatedApp(?int $page): Response {
        return $this->connector->send(new AppsListInstallationRequestsForAuthenticatedApp($page));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function ListInstallations(?int $page, ?string $since, ?string $outdated): Response {
        return $this->connector->send(new AppsListInstallations($page, $since, $outdated));
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     */
    public function GetInstallation(int $installationId): Response {
        return $this->connector->send(new AppsGetInstallation($installationId));
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     */
    public function DeleteInstallation(int $installationId): Response {
        return $this->connector->send(new AppsDeleteInstallation($installationId));
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     */
    public function CreateInstallationAccessToken(int $installationId): Response {
        return $this->connector->send(new AppsCreateInstallationAccessToken($installationId));
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     */
    public function SuspendInstallation(int $installationId): Response {
        return $this->connector->send(new AppsSuspendInstallation($installationId));
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     */
    public function UnsuspendInstallation(int $installationId): Response {
        return $this->connector->send(new AppsUnsuspendInstallation($installationId));
    }

    /**
     * @param  string  $clientId  The client ID of the GitHub app.
     */
    public function DeleteAuthorization(string $clientId): Response {
        return $this->connector->send(new AppsDeleteAuthorization($clientId));
    }

    /**
     * @param  string  $clientId  The client ID of the GitHub app.
     */
    public function CheckToken(string $clientId): Response {
        return $this->connector->send(new AppsCheckToken($clientId));
    }

    /**
     * @param  string  $clientId  The client ID of the GitHub app.
     */
    public function DeleteToken(string $clientId): Response {
        return $this->connector->send(new AppsDeleteToken($clientId));
    }

    /**
     * @param  string  $clientId  The client ID of the GitHub app.
     */
    public function ResetToken(string $clientId): Response {
        return $this->connector->send(new AppsResetToken($clientId));
    }

    /**
     * @param  string  $clientId  The client ID of the GitHub app.
     */
    public function ScopeToken(string $clientId): Response {
        return $this->connector->send(new AppsScopeToken($clientId));
    }

    public function GetBySlug(string $appSlug): Response {
        return $this->connector->send(new AppsGetBySlug($appSlug));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function ListReposAccessibleToInstallation(?int $page): Response {
        return $this->connector->send(new AppsListReposAccessibleToInstallation($page));
    }

    public function RevokeInstallationAccessToken(): Response {
        return $this->connector->send(new AppsRevokeInstallationAccessToken);
    }

    /**
     * @param  int  $accountId  account_id parameter
     */
    public function GetSubscriptionPlanForAccount(int $accountId): Response {
        return $this->connector->send(new AppsGetSubscriptionPlanForAccount($accountId));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function ListPlans(?int $page): Response {
        return $this->connector->send(new AppsListPlans($page));
    }

    /**
     * @param  int  $planId  The unique identifier of the plan.
     * @param  string  $sort  The property to sort the results by.
     * @param  string  $direction  To return the oldest accounts first, set to `asc`. Ignored without the `sort` parameter.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function ListAccountsForPlan(int $planId, ?string $sort, ?string $direction, ?int $page): Response {
        return $this->connector->send(new AppsListAccountsForPlan($planId, $sort, $direction, $page));
    }

    /**
     * @param  int  $accountId  account_id parameter
     */
    public function GetSubscriptionPlanForAccountStubbed(int $accountId): Response {
        return $this->connector->send(new AppsGetSubscriptionPlanForAccountStubbed($accountId));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function ListPlansStubbed(?int $page): Response {
        return $this->connector->send(new AppsListPlansStubbed($page));
    }

    /**
     * @param  int  $planId  The unique identifier of the plan.
     * @param  string  $sort  The property to sort the results by.
     * @param  string  $direction  To return the oldest accounts first, set to `asc`. Ignored without the `sort` parameter.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function ListAccountsForPlanStubbed(int $planId, ?string $sort, ?string $direction, ?int $page): Response {
        return $this->connector->send(new AppsListAccountsForPlanStubbed($planId, $sort, $direction, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function GetOrgInstallation(string $org): Response {
        return $this->connector->send(new AppsGetOrgInstallation($org));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function GetRepoInstallation(string $owner, string $repo): Response {
        return $this->connector->send(new AppsGetRepoInstallation($owner, $repo));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function ListInstallationsForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new AppsListInstallationsForAuthenticatedUser($page));
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function ListInstallationReposForAuthenticatedUser(int $installationId, ?int $page): Response {
        return $this->connector->send(new AppsListInstallationReposForAuthenticatedUser($installationId, $page));
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     * @param  int  $repositoryId  The unique identifier of the repository.
     */
    public function AddRepoToInstallationForAuthenticatedUser(int $installationId, int $repositoryId): Response {
        return $this->connector->send(new AppsAddRepoToInstallationForAuthenticatedUser($installationId,
            $repositoryId));
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     * @param  int  $repositoryId  The unique identifier of the repository.
     */
    public function RemoveRepoFromInstallationForAuthenticatedUser(int $installationId, int $repositoryId): Response {
        return $this->connector->send(new AppsRemoveRepoFromInstallationForAuthenticatedUser($installationId,
            $repositoryId));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function ListSubscriptionsForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new AppsListSubscriptionsForAuthenticatedUser($page));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function ListSubscriptionsForAuthenticatedUserStubbed(?int $page): Response {
        return $this->connector->send(new AppsListSubscriptionsForAuthenticatedUserStubbed($page));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function GetUserInstallation(string $username): Response {
        return $this->connector->send(new AppsGetUserInstallation($username));
    }
}
