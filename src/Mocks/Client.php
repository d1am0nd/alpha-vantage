<?php

namespace AlphaVantage\Mocks;

use AlphaVantage\Mocks\Response;
use AlphaVantage\Contracts\ClientInterface;

class Client implements ClientInterface {

    // Config
    private $config;

    // Additional testing info
    private $payload;

    public function __construct($config, $payload = [])
    {
        $this->config = $config;
        $this->payload = $payload;
    }

    public function request($method, $nothing = '', array $params = [])
    {
        $res = new Response($params);
        $this->payload['response'] = $res->getBody(false);
        $this->payload['method'] = $method;
        return $res;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig($config)
    {
        $this->config = $config;
    }

    public function getPayload()
    {
        return $this->payload;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

}
