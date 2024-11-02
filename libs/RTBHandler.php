<?php
include 'BidRequest.php';
include 'CampaignSelector.php';


class RTBHandler
{
    private $campaigns;

    public function __construct(array $campaigns)
    {
        $this->campaigns = $campaigns;
    }

    public function handleRequest($request)
    {
        $bidRequest = new BidRequest($request);

        if (!$bidRequest->isValid()) {
            return json_encode(["error" => "Invalid bid request"]);
        }

        $selector           = new CampaignSelector($this->campaigns);
        $selectedCampaign = $selector->selectBestCampaign($bidRequest);

        
        if ($selectedCampaign) {
            return json_encode([
                "id"       => $bidRequest->getRequestId(),
                "campaign" => $selectedCampaign->getDetails()
            ]);
        } else {
            return json_encode(["error" => "No matching campaign found"]);
        }
    }
}