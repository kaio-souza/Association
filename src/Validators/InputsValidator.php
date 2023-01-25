<?php


namespace Association\Validators;


use Association\Exceptions\InsufficientItems;
use Association\Exceptions\InvalidDataSet;
use Association\Exceptions\InvalidThreshold;

class InputsValidator
{
    const MINIMUM_ITEMS = 2;

    public static function validateThreshold($threshold)
    {
        if ($threshold <= 0 || $threshold > 1)
            throw new InvalidThreshold;

        return $threshold;
    }
}