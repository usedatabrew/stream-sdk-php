<?php

namespace DataBrew;

class Options
{
    private string $apiKey;
    private string $apiHost = "https://api.databrew.tech";
    private string $streamHost = "prod.gateway.databrew.tech:9000";
    
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function setApiKey(string $key)
    {
        $this->apiKey = $key;
    }
    
    public function getApiHost(): string
    {
        return $this->apiHost;
    }

    public function setApiHost($host)
    {
        $this->apiHost = $host;
    }
    
    public function getStreamHost(): string
    {
        return $this->streamHost;
    }

    public function setStreamHost($host)
    {
        $this->streamHost = $host;
    }
}