<?php

namespace AlphaVantage\Exception;

/**
 * Class BadDataTypeException
 * @package AlphaVantage\Exception
 */
class BadDataTypeException extends \Exception
{
    public function __construct($type = null, $code = 0, Exception $previous = null)
    {
        parent::__construct(self::makeMessage($type), $code, $previous);
    }

    private static function makeMessage($type)
    {
        return "Datatype \"$type\" is not supported by the package";
    }
}
