<?php

namespace Tests\Unit;

use AlphaVantage\Api\Stock;
use AlphaVantage\Api\Sector;
use AlphaVantage\Api\General;
use AlphaVantage\Api\Currency;
use AlphaVantage\Api\DigitalCurrency;
use AlphaVantage\Mocks\MasterApi as MasterMock;
use AlphaVantage\Mocks\Client;
use AlphaVantage\Mocks\ApiFactory;
use PHPUnit\Framework\TestCase;

class ApiParent extends TestCase
{

    protected $currency;

    protected $digitalCurrency;

    protected $master;

    protected $sector;

    protected $stock;

    protected $general;

    protected function setUp()
    {
        $this->currency = $this->make(Currency::class);
        $this->digitalCurrency = $this->make(DigitalCurrency::class);
        $this->master = $this->make(MasterMock::class);
        $this->sector = $this->make(Sector::class);
        $this->stock = $this->make(Stock::class);
        $this->general = $this->make(General::class);
    }

    protected function paramEquals($res, $param, $equals)
    {
        $val = $res['query'][$param];
        $this->assertEquals($val, $equals, "Param $param equals $val, should be $equals");
    }

    protected function paramsEqual(array $res, array $paramArray)
    {
        foreach ($paramArray as $param => $val) {
            $this->paramEquals($res, $param, $val);
        }
    }

    private function make($api)
    {
        return new $api(new Client([
            'base_uri' => 'https://www.alphavantage.co/query',
        ]), 123456789);
    }
}
