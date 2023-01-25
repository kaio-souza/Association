<?php


namespace KaioSouza\Association\Validators;


use KaioSouza\Association\Exceptions\InsufficientItems;
use KaioSouza\Association\Exceptions\InvalidDataSet;
use KaioSouza\Association\Exceptions\InvalidThreshold;

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