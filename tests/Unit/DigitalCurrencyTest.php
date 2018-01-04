<?php

namespace Tests\Unit;

use Tests\Unit\ParentTest;

class DigitalCurrencyTest extends ApiParent
{
    public function testIntraday()
    {
        $this->funcTest('intraday', 'DIGITAL_CURRENCY_INTRADAY');
    }

    public function testDaily()
    {
        $this->funcTest('daily', 'DIGITAL_CURRENCY_DAILY');
    }

    public function testWeekly()
    {
        $this->funcTest('weekly', 'DIGITAL_CURRENCY_WEEKLY');
    }

    public function testMonthly()
    {
        $this->funcTest('monthly', 'DIGITAL_CURRENCY_MONTHLY');
    }

    private function funcTest($fn, $expected)
    {
        $exp = [
            'symbol' => 'BTC',
            'market' => 'EUR',
        ];
        $res = $this->digitalCurrency->$fn($exp['symbol'], $exp['market']);
        // Assert correct function
        $this->paramEquals($res, 'function', $expected);
        // Assert correct parameters
        $this->paramsEqual($res, $exp);
    }
}
