<?php

namespace AlphaVantage\Exception;

/**
 * Class BadMethodCallException
 * @package AlphaVantage\Exception
 */
class BadMethodCallException extends \Exception
{
    public function __construct($function = null, $code = 0, Exception $previous = null)
    {
        parent::__construct(self::makeMessage($function), $code, $previous);
    }

    private static function makeMessage($func)
    {
        return "Bad function: $func";
    }
}
