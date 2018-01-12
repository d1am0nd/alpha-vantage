<?php

namespace AlphaVantage;

use AlphaVantage\Api\Stock;
use AlphaVantage\Api\Sector;
use AlphaVantage\Api\General;
use AlphaVantage\Api\Currency;
use AlphaVantage\Api\DigitalCurrency;
use AlphaVantage\Factory\Api as ApiFactory;
use AlphaVantage\Guzzle\Client;
use PHPUnit\Framework\TestCase;

class Api
{
    public static function currency()
    {
        return ApiFactory::currency(self::getKey());
    }

    public static function digitalCurrency()
    {
        return ApiFactory::digitalCurrency(self::getKey());
    }

    public static function sector()
    {
        return ApiFactory::sector(self::getKey());
    }

    public static function stock()
    {
        return ApiFactory::stock(self::getKey());
    }

    public static function general()
    {
        return ApiFactory::general(self::getKey());
    }

    protected static function getKey()
    {
        return env('AV_KEY', null);
    }
}
