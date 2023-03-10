<?php


namespace Association\Exceptions;


use Association\Constants\ErrorCodes;
use Association\Constants\ErrorMessages;
use Throwable;

class InsufficientItems extends \Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(ErrorMessages::INSUFFICIENT_ITEMS, ErrorCodes::INVALID_INPUT, $previous);
    }
}