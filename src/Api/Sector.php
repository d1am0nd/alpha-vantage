<?php

namespace AlphaVantage\Api;

use AlphaVantage\Api\Master;
use GuzzleHttp\Client;
use AlphaVantage\Exception\BadMethodCallException;

class Sector extends Master {

    /* Available AlphaVantage sector functions */

    // https://www.alphavantage.co/documentation/#sector
    const SECTOR = 'SECTOR';

    private $availableFunctions = [
        self::SECTOR,
    ];

    /**
     * SECTOR
     * @param  string $params   Additional params
     * @return Response object
     */
    public function sectors($params = [])
    {
        return $this->query(self::SECTOR, $params);
    }

    /**
     * Checks if the provided function name is available
     * @param  string $name Name of the AV function to execute
     * @return boolean
     */
    protected function funcAvailable($name)
    {
        return in_array($name, $this->availableFunctions);
    }
}
