<?php

class Campaign
{
    private $campaignData;

    public function __construct($data)
    {
        $this->campaignData = $data;
    }

    public function isSuitable(BidRequest $bidRequest)
    {
        return $this->campaignData['country'] === $bidRequest->getDeviceGeoCountry() &&
            $this->campaignData['dimension'] === $bidRequest->getDimensions() &&
            $this->campaignData['price'] >= $bidRequest->getBidFloor();
    }

    public function getPrice()
    {
        return $this->campaignData['price'];
    }

    public function getDetails()
    {
        return [
            "campaignname"  => $this->campaignData['campaignname'],
            "advertiser"    => $this->campaignData['advertiser'],
            "price"         => $this->campaignData['price'],
            "creative_id"   => $this->campaignData['creative_id'],
            "image_url"     => $this->campaignData['image_url'],
            "landing_page"  => $this->campaignData['landing_page']
        ];
    }
}