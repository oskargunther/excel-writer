<?php


namespace ExcelWriter\Exception;


use Throwable;

class InvalidParameterClassException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}