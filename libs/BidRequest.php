<?php

class BidRequest
{
    private $data;

    public function __construct($request)
    {
        $this->data = json_decode($request, true);
    }

    public function isValid()
    {
        return isset($this->data['device']) && isset($this->data['imp']) && isset($this->data['imp'][0]['banner']);
    }

    public function getDeviceGeoCountry()
    {
        return $this->data['device']['geo']['country'] ?? '';
    }

    public function getBidFloor()
    {
        return $this->data['imp'][0]['bidfloor'] ?? 0;
    }

    public function getDimensions()
    {
        $banner = $this->data['imp'][0]['banner'];
        return "{$banner['w']}x{$banner['h']}";
    }

    public function getRequestId()
    {
        return $this->data['id'] ?? '';
    }
}