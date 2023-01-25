<?php


namespace Association\Exceptions;


use Association\Constants\ErrorCodes;
use Association\Constants\ErrorMessages;
use Throwable;

class InvalidInputToAssociate extends \Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(ErrorMessages::INVALID_INPUT, ErrorCodes::INVALID_INPUT, $previous);
    }
}