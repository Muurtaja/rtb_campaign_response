<?php

include 'Campaign.php';


class CampaignSelector
{
    private $campaigns;

    public function __construct(array $campaigns)
    {
        $this->campaigns = $campaigns;
    }

    public function selectBestCampaign(BidRequest $bidRequest)
    {
        $bestCampaign = null;

        foreach ($this->campaigns as $campaignData) {
            
            $campaign = new Campaign($campaignData);
            
            if ($campaign->isSuitable($bidRequest)) {

                if (!$bestCampaign || ($campaign->getPrice() > $bestCampaign->getPrice())) {
                    $bestCampaign = $campaign;
                }
            }
        }

        return $bestCampaign;
    }
}