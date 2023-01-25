<?php


namespace Association\Exceptions;


use Association\Constants\ErrorCodes;
use Association\Constants\ErrorMessages;
use Throwable;

class DatasetNotDefined extends \Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(ErrorMessages::DATA_SET_NOT_DEFINED, ErrorCodes::UTILIZATION_ERROR, $previous);
    }
}