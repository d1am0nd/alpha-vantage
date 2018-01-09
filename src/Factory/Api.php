<?php

namespace AlphaVantage\Factory;

use AlphaVantage\Api\Stock;
use AlphaVantage\Api\Sector;
use AlphaVantage\Api\General;
use AlphaVantage\Api\Currency;
use AlphaVantage\Api\DigitalCurrency;
use AlphaVantage\Guzzle\Client;
use PHPUnit\Framework\TestCase;

class Api
{
    public static function currency($key)
    {
        return self::make(Currency::class, $key);
    }

    public static function digitalCurrency($key)
    {
        return self::make(DigitalCurrency::class, $key);
    }

    public static function sector($key)
    {
        return self::make(Sector::class, $key);
    }

    public static function stock($key)
    {
        return self::make(Stock::class, $key);
    }

    public static function general($key)
    {
        return self::make(General::class, $key);
    }

    private static function make($api, $key)
    {
        return new $api(new Client([
            'base_uri' => 'https://www.alphavantage.co/query',
        ]), $key);
    }
}
