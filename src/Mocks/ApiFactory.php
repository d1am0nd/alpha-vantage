<?php

namespace AlphaVantage\Mocks;

use AlphaVantage\Factory\Api;
use PHPUnit\Framework\TestCase;

class ApiFactory
{
    public static function currency()
    {
        return Api::currency(self::getKey());
    }

    public static function digitalCurrency()
    {
        return Api::digitalCurrency(self::getKey());
    }

    public static function sector()
    {
        return Api::sector(self::getKey());
    }

    public static function stock()
    {
        return Api::stock(self::getKey());
    }

    public static function general()
    {
        return Api::general(self::getKey());
    }

    protected static function getKey($key = null)
    {
        return $key ? $key : '123';
    }
}
