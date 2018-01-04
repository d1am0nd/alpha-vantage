<?php

namespace Tests\Unit;

use Tests\Unit\ParentTest;

class CurrencyTest extends ApiParent
{
    public function testCurrencyExchangeRate()
    {
        $exp = [
            'from_currency' => 'USD',
            'to_currency' => 'EUR',
        ];
        $res = $this->currency->currencyExchangeRate($exp['from_currency'], $exp['to_currency']);
        // Assert correct function
        $this->paramEquals($res, 'function', 'CURRENCY_EXCHANGE_RATE');
        // Assert correct parameters
        $this->paramsEqual($res, $exp);
    }
}
