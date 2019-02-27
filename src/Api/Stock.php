<?php

namespace AlphaVantage\Api;

use AlphaVantage\Api\Master;
use GuzzleHttp\Client;
use AlphaVantage\Exception\BadMethodCallException;

class Stock extends Master {

    /* Available AlphaVantage stock functions */

    // https://www.alphavantage.co/documentation/#intraday
    const TIME_SERIES_INTRADAY = 'TIME_SERIES_INTRADAY';

    // https://www.alphavantage.co/documentation/#daily
    const TIME_SERIES_DAILY = 'TIME_SERIES_DAILY';

    // https://www.alphavantage.co/documentation/#dailyadj
    const TIME_SERIES_DAILY_ADJUSTED = 'TIME_SERIES_DAILY_ADJUSTED';

    // https://www.alphavantage.co/documentation/#weekly
    const TIME_SERIES_WEEKLY = 'TIME_SERIES_WEEKLY';

    // https://www.alphavantage.co/documentation/#weeklyadj
    const TIME_SERIES_WEEKLY_ADJUSTED = 'TIME_SERIES_WEEKLY_ADJUSTED';

    // https://www.alphavantage.co/documentation/#monthly
    const TIME_SERIES_MONTHLY = 'TIME_SERIES_MONTHLY';

    // https://www.alphavantage.co/documentation/#monthlyadj
    const TIME_SERIES_MONTHLY_ADJUSTED = 'TIME_SERIES_MONTHLY_ADJUSTED';

    // https://www.alphavantage.co/documentation/#batchquotes
    const BATCH_STOCK_QUOTES = 'BATCH_STOCK_QUOTES';

    // https://www.alphavantage.co/documentation/#latestprice
    const GLOBAL_QUOTE = 'GLOBAL_QUOTE';

    // https://www.alphavantage.co/documentation/#symbolsearch
    const SYMBOL_SEARCH = 'SYMBOL_SEARCH';

    private $availableFunctions = [
        self::TIME_SERIES_INTRADAY,
        self::TIME_SERIES_DAILY,
        self::TIME_SERIES_DAILY_ADJUSTED,
        self::TIME_SERIES_WEEKLY,
        self::TIME_SERIES_WEEKLY_ADJUSTED,
        self::TIME_SERIES_MONTHLY,
        self::TIME_SERIES_MONTHLY_ADJUSTED,
        self::BATCH_STOCK_QUOTES,
        self::GLOBAL_QUOTE,
        self::SYMBOL_SEARCH,
    ];

    /**
     * TIME_SERIES_INTRADAY
     * @param  string $symbol Single stock symbol
     * @param  array  $params Additional API parameters
     * @return Object         Decoded API object
     */
    public function intraday($symbol, $params = [])
    {
        return $this->query(self::TIME_SERIES_INTRADAY, array_merge($params, [
            'symbol' => $symbol,
        ]));
    }

    /**
     * TIME_SERIES_DAILY
     * @param  string $symbol Single stock symbol
     * @param  array  $params Additional API parameters
     * @return Object         Decoded API object
     */
    public function daily($symbol, $params = [])
    {
        return $this->query(self::TIME_SERIES_DAILY, array_merge($params, [
            'symbol' => $symbol,
        ]));
    }

    /**
     * TIME_SERIES_DAILY_ADJUSTED
     * @param  string $symbol Single stock symbol
     * @param  array  $params Additional API parameters
     * @return Object         Decoded API object
     */
    public function dailyAdjusted($symbol, $params = [])
    {
        return $this->query(self::TIME_SERIES_DAILY_ADJUSTED, array_merge($params, [
            'symbol' => $symbol,
        ]));
    }

    /**
     * TIME_SERIES_WEEKLY
     * @param  string $symbol Single stock symbol
     * @param  array  $params Additional API parameters
     * @return Object         Decoded API object
     */
    public function weekly($symbol, $params = [])
    {
        return $this->query(self::TIME_SERIES_WEEKLY, array_merge($params, [
            'symbol' => $symbol,
        ]));
    }

    /**
     * TIME_SERIES_WEEKLY_ADJUSTED
     * @param  string $symbol Single stock symbol
     * @param  array  $params Additional API parameters
     * @return Object         Decoded API object
     */
    public function weeklyAdjusted($symbol, $params = [])
    {
        return $this->query(self::TIME_SERIES_WEEKLY_ADJUSTED, array_merge($params, [
            'symbol' => $symbol,
        ]));
    }

    /**
     * TIME_SERIES_MONTHLY
     * @param  string $symbol Single stock symbol
     * @param  array  $params Additional API parameters
     * @return Object         Decoded API object
     */
    public function monthly($symbol, $params = [])
    {
        return $this->query(self::TIME_SERIES_MONTHLY, array_merge($params, [
            'symbol' => $symbol,
        ]));
    }

    /**
     * TIME_SERIES_MONTHLY_ADJUSTED
     * @param  string $symbol Single stock symbol
     * @param  array  $params Additional API parameters
     * @return Object         Decoded API object
     */
    public function monthlyAdjusted($symbol, $params = [])
    {
        return $this->query(self::TIME_SERIES_MONTHLY_ADJUSTED, array_merge($params, [
            'symbol' => $symbol,
        ]));
    }

    /**
     * BATCH_STOCK_QUOTES
     * @param  string $symbol Multiple stock symbols, exploded by ','
     * @param  array  $params Additional API parameters
     * @return Object         Decoded API object
     */
    public function batchStockQuotes($symbols, $params = [])
    {
        return $this->query(self::BATCH_STOCK_QUOTES, array_merge($params, [
            'symbols' => $symbols,
        ]));
    }

    /**
     * GLOBAL_QUOTE
     * @param  string $symbol Single stock symbol
     * @param  array  $params Additional API parameters
     * @return Object         Decoded API object
     */
    public function quote($symbol, $params = [])
    {
        return $this->query(self::GLOBAL_QUOTE, array_merge($params, [
            'symbol' => $symbol,
        ]));
    }

    /**
     * SYMBOL_SEARCH
     * @param  string $keywords A text string of your choice
     * @param  array  $params   Additional API parameters
     * @return Object           Decoded API object
     */
    public function search($keywords, $params = [])
    {
        return $this->query(self::SYMBOL_SEARCH, array_merge($params, [
            'keywords' => $keywords,
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
