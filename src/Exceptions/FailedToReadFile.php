<?php


namespace Association\Exceptions;


use Association\Constants\ErrorCodes;
use Association\Constants\ErrorMessages;
use Throwable;

class FailedToReadFile extends \Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(ErrorMessages::FAILED_ON_READ_FILE, ErrorCodes::FILE_PROCCESS_ERROR, $previous);
    }
}