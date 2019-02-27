<?php

namespace Tests\Unit;

use Tests\Unit\ParentTest;

class StockTest extends ApiParent
{
    public function testIntraday()
    {
        $this->funcTest('intraday', 'TIME_SERIES_INTRADAY');
    }

    public function testDaily()
    {
        $this->funcTest('daily', 'TIME_SERIES_DAILY');
    }

    public function testDailyAdjusted()
    {
        $this->funcTest('dailyAdjusted', 'TIME_SERIES_DAILY_ADJUSTED');
    }

    public function testWeekly()
    {
        $this->funcTest('weekly', 'TIME_SERIES_WEEKLY');
    }

    public function testWeeklyAdjusted()
    {
        $this->funcTest('weeklyAdjusted', 'TIME_SERIES_WEEKLY_ADJUSTED');
    }

    public function testMonthly()
    {
        $this->funcTest('monthly', 'TIME_SERIES_MONTHLY');
    }

    public function testMonthlyAdjusted()
    {
        $this->funcTest('monthlyAdjusted', 'TIME_SERIES_MONTHLY_ADJUSTED');
    }

    public function testBatchStockQuotes()
    {
        $exp = [
            'symbols' => ['MSFT', 'GOOG'],
        ];
        $res = $this->stock->batchStockQuotes($exp['symbols']);
        // Assert correct function
        $this->paramEquals($res, 'function', 'BATCH_STOCK_QUOTES');
        // Assert correct parameters
        $this->assertContains('MSFT', $res['query']['symbols']);
        $this->assertContains('GOOG', $res['query']['symbols']);
    }

    public function testquote()
    {
        $this->funcTest('quote', 'GLOBAL_QUOTE');
    }

    private function funcTest($fn, $expected)
    {
        $exp = [
            'symbol' => 'MSFT',
        ];
        $res = $this->stock->$fn($exp['symbol']);
        // Assert correct function
        $this->paramEquals($res, 'function', $expected);
        // Assert correct parameters
        $this->paramsEqual($res, $exp);
    }
}
