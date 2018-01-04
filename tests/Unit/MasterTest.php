<?php

namespace Tests\Unit;

use Tests\Unit\ParentTest;
use AlphaVantage\Exception\BadDataTypeException;
use AlphaVantage\Exception\BadMethodCallException;
use AlphaVantage\Exception\MissingApiKeyException;

class MasterTest extends ApiParent
{
    public function testQuerySuccess()
    {
        $funcName = 'Some function';
        $additionalParams = [
            'test' => 'test',
            'test2' => 'test2',
        ];
        $this->master->setFuncAvailable(true);

        $res = $this->master->query($funcName, $additionalParams);
        // Assert correct function
        $this->paramEquals($res, 'function', $funcName);
        $this->paramEquals($res, 'apikey', 123456789);
        // Assert other params were passed
        $this->paramsEqual($res, $additionalParams);
    }

    public function testQueryBadDataTypeException()
    {
        $this->master->setFuncAvailable(true);

        $this->expectException(BadDataTypeException::class);
        $this->master->query('test', ['datatype' => 'csv']);
    }

    public function testQueryBadMethodCallException()
    {
        $this->master->setFuncAvailable(false);

        $this->expectException(BadMethodCallException::class);
        $this->master->query('test', []);
    }

}
