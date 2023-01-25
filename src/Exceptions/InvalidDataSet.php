<?php


namespace KaioSouza\Association\Exceptions;


use KaioSouza\Association\Constants\ErrorCodes;
use KaioSouza\Association\Constants\ErrorMessages;
use Throwable;

class InvalidDataSet extends \Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(ErrorMessages::INVALID_DATASET, ErrorCodes::INVALID_INPUT, $previous);
    }
}