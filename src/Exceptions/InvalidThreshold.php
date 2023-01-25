<?php


namespace KaioSouza\Association\Exceptions;


use KaioSouza\Association\Constants\ErrorCodes;
use KaioSouza\Association\Constants\ErrorMessages;
use Throwable;

class InvalidThreshold extends \Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(ErrorMessages::INVALID_THRESHOLD, ErrorCodes::INVALID_INPUT, $previous);
    }
}