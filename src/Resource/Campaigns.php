<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Campaigns\CampaignsCreateCampaign;
use Oneduo\GitHubSdk\Requests\Campaigns\CampaignsDeleteCampaign;
use Oneduo\GitHubSdk\Requests\Campaigns\CampaignsGetCampaignSummary;
use Oneduo\GitHubSdk\Requests\Campaigns\CampaignsListOrgCampaigns;
use Oneduo\GitHubSdk\Requests\Campaigns\CampaignsUpdateCampaign;
use Saloon\Http\Response;

class Campaigns extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $state  If specified, only campaigns with this state will be returned.
     * @param  string  $sort  The property by which to sort the results.
     */
    public function campaignsListOrgCampaigns(
        string $org,
        ?int $page,
        ?string $direction,
        ?string $state,
        ?string $sort,
    ): Response {
        return $this->connector->send(new CampaignsListOrgCampaigns($org, $page, $direction, $state, $sort));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function campaignsCreateCampaign(string $org): Response {
        return $this->connector->send(new CampaignsCreateCampaign($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $campaignNumber  The campaign number.
     */
    public function campaignsGetCampaignSummary(string $org, int $campaignNumber): Response {
        return $this->connector->send(new CampaignsGetCampaignSummary($org, $campaignNumber));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $campaignNumber  The campaign number.
     */
    public function campaignsDeleteCampaign(string $org, int $campaignNumber): Response {
        return $this->connector->send(new CampaignsDeleteCampaign($org, $campaignNumber));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $campaignNumber  The campaign number.
     */
    public function campaignsUpdateCampaign(string $org, int $campaignNumber): Response {
        return $this->connector->send(new CampaignsUpdateCampaign($org, $campaignNumber));
    }
}
