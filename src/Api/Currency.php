<?php

namespace AlphaVantage\Api;

use AlphaVantage\Api\Master;
use GuzzleHttp\Client;
use AlphaVantage\Exception\BadMethodCallException;

class Currency extends Master {

    /* Available AlphaVantage currency functions */

    // https://www.alphavantage.co/documentation/#currency-exchange
    const CURRENCY_EXCHANGE_RATE = 'CURRENCY_EXCHANGE_RATE';

    // https://www.alphavantage.co/documentation/#fx-intraday
    const FX_INTRADAY = 'FX_INTRADAY';

    // https://www.alphavantage.co/documentation/#fx-daily
    const FX_DAILY = 'FX_DAILY';

    // https://www.alphavantage.co/documentation/#fx-weekly
    const FX_WEEKLY = 'FX_WEEKLY';

    // https://www.alphavantage.co/documentation/#fx-monthly
    const FX_MONTHLY = 'FX_MONTHLY';

    private $availableFunctions = [
        self::CURRENCY_EXCHANGE_RATE,
        self::FX_INTRADAY,
        self::FX_DAILY,
        self::FX_WEEKLY,
        self::FX_MONTHLY,
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
     * FX_INTRADAY
     * @param  string $from      The currency you would like to get the exchange rate for.
     * @param  string $to        The destination currency for the exchange rate.
     * @param  string $interval  One of: 1min, 5min, 15min, 30min, 60min.
     * @param  string $params    Additional params
     * @return Object            Response object
     */
    public function intraday($from, $to, $interval, $params = [])
    {
        return $this->query(self::FX_INTRADAY, array_merge($params, [
            'from_symbol' => $from,
            'to_symbol' => $to,
            'interval' => $interval,
        ]));
    }

    /**
     * FX_DAILY
     * @param  string $from      The currency you would like to get the exchange rate for.
     * @param  string $to        The destination currency for the exchange rate.
     * @param  string $params    Additional params
     * @return Object            Response object
     */
    public function daily($from, $to, $params = [])
    {
        return $this->query(self::FX_DAILY, array_merge($params, [
            'from_symbol' => $from,
            'to_symbol' => $to,
        ]));
    }

    /**
     * FX_WEEKLY
     * @param  string $from      The currency you would like to get the exchange rate for.
     * @param  string $to        The destination currency for the exchange rate.
     * @param  string $params    Additional params
     * @return Object            Response object
     */
    public function weekly($from, $to, $params = [])
    {
        return $this->query(self::FX_WEEKLY, array_merge($params, [
            'from_symbol' => $from,
            'to_symbol' => $to,
        ]));
    }

    /**
     * FX_MONTHLY
     * @param  string $from      The currency you would like to get the exchange rate for.
     * @param  string $to        The destination currency for the exchange rate.
     * @param  string $params    Additional params
     * @return Object            Response object
     */
    public function monthly($from, $to, $params = [])
    {
        return $this->query(self::FX_MONTHLY, array_merge($params, [
            'from_symbol' => $from,
            'to_symbol' => $to,
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
