<?php


namespace Association\Exceptions;


use Association\Constants\ErrorCodes;
use Association\Constants\ErrorMessages;
use Throwable;

class InvalidDataSet extends \Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(ErrorMessages::INVALID_DATASET, ErrorCodes::INVALID_INPUT, $previous);
    }
}