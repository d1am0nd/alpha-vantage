<?php

namespace Tests\Unit;

use AlphaVantage\Mocks\ApiFactory;
use AlphaVantage\Api\Stock;
use AlphaVantage\Api\Sector;
use AlphaVantage\Api\General;
use AlphaVantage\Api\Currency;
use AlphaVantage\Api\DigitalCurrency;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function testCurrencySuccess()
    {
        $this->assertTrue(ApiFactory::currency() instanceof Currency);
    }

    public function testDigitalCurrencySuccess()
    {
        $this->assertTrue(ApiFactory::digitalCurrency() instanceof DigitalCurrency);
    }

    public function testSectorSuccess()
    {
        $this->assertTrue(ApiFactory::sector() instanceof Sector);
    }

    public function testStockSuccess()
    {
        $this->assertTrue(ApiFactory::stock() instanceof Stock);
    }

    public function testGeneralSuccess()
    {
        $this->assertTrue(ApiFactory::general() instanceof General);
    }
}
