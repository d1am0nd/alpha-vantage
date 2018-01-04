<?php

namespace AlphaVantage\Exception;

/**
 * Class MissingApiKeyException
 * @package AlphaVantage\Exception
 */
class MissingApiKeyException extends \Exception
{
    public function __construct($function = null, $code = 0, Exception $previous = null)
    {
        parent::__construct(self::makeMessage($function), $code, $previous);
    }

    private static function makeMessage($func)
    {
        return "Missing api key in .env";
    }
}
