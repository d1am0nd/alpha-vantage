<?php

namespace AlphaVantage\Api;

use AlphaVantage\API\Master;
use GuzzleHttp\Client;
use AlphaVantage\Exception\BadMethodCallException;

class Currency extends Master {

    /* Available AlphaVantage currency functions */

    // https://www.alphavantage.co/documentation/#currency-exchange
    const CURRENCY_EXCHANGE_RATE = 'CURRENCY_EXCHANGE_RATE';

    private $availableFunctions = [
        self::CURRENCY_EXCHANGE_RATE,
    ];

    /**
     * CURRENCY_EXCHANGE_RATE
     * @param  string $from The currency you would like to get the exchange rate for.
     * @param  string $to   The destination currency for the exchange rate.
     * @param  string $params   Additional params
     * @return Response object
     */
    public function currencyExchangeRate($from, $to, $params = [])
    {
        return $this->query(self::CURRENCY_EXCHANGE_RATE, array_merge($params, [
            'from_currency' => $from,
            'to_currency' => $to,
        ]));
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
