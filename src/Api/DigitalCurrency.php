<?php

namespace AlphaVantage\Api;

use AlphaVantage\Api\Master;
use GuzzleHttp\Client;
use AlphaVantage\Exception\BadMethodCallException;

class DigitalCurrency extends Master {

    /* Available AlphaVantage currency functions */

    // https://www.alphavantage.co/documentation/#currency-intraday
    const DIGITAL_CURRENCY_INTRADAY = 'DIGITAL_CURRENCY_INTRADAY';
    // https://www.alphavantage.co/documentation/#currency-daily
    const DIGITAL_CURRENCY_DAILY = 'DIGITAL_CURRENCY_DAILY';
    // https://www.alphavantage.co/documentation/#currency-weekly
    const DIGITAL_CURRENCY_WEEKLY = 'DIGITAL_CURRENCY_WEEKLY';
    // https://www.alphavantage.co/documentation/#currency-monthly
    const DIGITAL_CURRENCY_MONTHLY = 'DIGITAL_CURRENCY_MONTHLY';

    private $availableFunctions = [
        self::DIGITAL_CURRENCY_INTRADAY,
        self::DIGITAL_CURRENCY_DAILY,
        self::DIGITAL_CURRENCY_WEEKLY,
        self::DIGITAL_CURRENCY_MONTHLY,
    ];

    /**
     * DIGITAL_CURRENCY_INTRADAY
     * @param  string $symbol The digital/crypto currency of your choice.
     * @param  string $market   The exchange market of your choice.
     * @param  string $params   Additional params
     * @return Response object
     */
    public function intraday($symbol, $market, $params = [])
    {
        return $this->query(self::DIGITAL_CURRENCY_INTRADAY, array_merge($params, [
            'symbol' => $symbol,
            'market' => $market,
        ]));
    }

    /**
     * DIGITAL_CURRENCY_DAILY
     * @param  string $symbol The digital/crypto currency of your choice.
     * @param  string $market   The exchange market of your choice.
     * @param  string $params   Additional params
     * @return Response object
     */
    public function daily($symbol, $market, $params = [])
    {
        return $this->query(self::DIGITAL_CURRENCY_DAILY, array_merge($params, [
            'symbol' => $symbol,
            'market' => $market,
        ]));
    }

    /**
     * DIGITAL_CURRENCY_WEEKLY
     * @param  string $symbol The digital/crypto currency of your choice.
     * @param  string $market   The exchange market of your choice.
     * @param  string $params   Additional params
     * @return Response object
     */
    public function weekly($symbol, $market, $params = [])
    {
        return $this->query(self::DIGITAL_CURRENCY_WEEKLY, array_merge($params, [
            'symbol' => $symbol,
            'market' => $market,
        ]));
    }

    /**
     * DIGITAL_CURRENCY_MONTHLY
     * @param  string $symbol The digital/crypto currency of your choice.
     * @param  string $market   The exchange market of your choice.
     * @param  string $params   Additional params
     * @return Response object
     */
    public function monthly($symbol, $market, $params = [])
    {
        return $this->query(self::DIGITAL_CURRENCY_MONTHLY, array_merge($params, [
            'symbol' => $symbol,
            'market' => $market,
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
