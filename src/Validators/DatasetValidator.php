<?php


namespace KaioSouza\Association\Validators;


use KaioSouza\Association\Exceptions\InsufficientItems;
use KaioSouza\Association\Exceptions\InvalidDataSet;

class DatasetValidator
{
    const MINIMUM_ITEMS = 2;

    public static function validateDataset($dataset)
    {
        // dataset needs to be an iterable
        if (!is_iterable($dataset))
            throw new InvalidDataSet;

        $length = count($dataset);

        // is necessary to have items to associate
        if ($length < self::MINIMUM_ITEMS)
            throw new InsufficientItems;

        // all items needs to be iterable
        for ($i = 0; $i < $length; $i++) {
            if (!is_iterable($dataset[$i]))
                throw new InvalidDataSet;
        }

        return $dataset;
    }
}