<?php

namespace AlphaVantage\Mocks;

class Response {

    private $body;

    public function __construct($body)
    {
        $this->body = $body;
    }

    public function getBody($encode = true)
    {
        return $encode ? json_encode($this->body) : $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }
}
