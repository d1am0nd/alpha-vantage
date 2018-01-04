<?php

namespace AlphaVantage\Api;

use AlphaVantage\Contracts\ClientInterface;
use AlphaVantage\Exception\BadDataTypeException;
use AlphaVantage\Exception\BadMethodCallException;

abstract class Master {

    // Guzzle
    protected $client;

    // Api key
    protected $apiKey;

    abstract protected function funcAvailable($funcName);

    public function __construct(ClientInterface $client, $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    /**
     * Queries AlphaVantage   API for type JSON and decodes response to an array
     * @param  string $func   Exact name of the AlphaVantage API function
     * @param  array  $params Additional API params
     * @return Object         Decoded API object
     */
    public function query($func, $params = [])
    {
        if (!$this->funcAvailable($func)) {
            throw new BadMethodCallException($func);
        }
        if (isset($params['datatype']) && $params['datatype'] !== 'json') {
            throw new BadDataTypeException($params['datatype']);
        }
        return json_decode((string)$this->client->request('GET', null, [
            'query' => array_merge([
                'function' => $func,
                'apikey' => $this->apiKey,
            ], $params),
        ])->getBody(), true);
    }
}
