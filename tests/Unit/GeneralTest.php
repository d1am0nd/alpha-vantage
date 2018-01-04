<?php

namespace Tests\Unit;

use Tests\Unit\ParentTest;
use AlphaVantage\Exception\BadDataTypeException;

class GeneralTest extends ApiParent
{
    public function testQuerySuccess()
    {
        $funcName = 'Some function';
        $additionalParams = [
            'test' => 'test',
            'test2' => 'test2',
        ];

        $res = $this->general->query($funcName, $additionalParams);
        // Assert correct function
        $this->paramEquals($res, 'function', $funcName);
        // Assert other params were passed
        $this->paramsEqual($res, $additionalParams);
    }

    public function testQueryBadDataTypeException()
    {
        $this->expectException(BadDataTypeException::class);
        $this->general->query('test', ['datatype' => 'csv']);
    }
}
