<?php

namespace KaioSouza\Association;

use KaioSouza\Association\Exceptions\InvalidInputToAssociate;
use KaioSouza\Association\Services\AssociationService;

class Association
{
    private $associationService;

    public function __construct($dataset, $threshold = null)
    {
        // TODO: Implements optional Dataset
        $this->associationService = new AssociationService($dataset, $threshold);
    }

    public function getMoreFrequentlyItem($length = 1, $showSupportValue = false)
    {
        $results = array_slice($this->associationService->supportList[0], 0, $length);

        if ($length == 1 && !$showSupportValue)
            return array_key_first($results);

        return $showSupportValue ? $results : array_keys($results);
    }

    public function getCombinations($value, $length = 1, $showSupportValue = false)
    {
        if (!isset($this->associationService->supportList[1][$value]))
            throw new InvalidInputToAssociate;

        $results = array_slice($this->associationService->supportList[1][$value], 0, $length);

        if ($length == 1 && !$showSupportValue)
            return array_key_first($results);

        return $showSupportValue ? $results : array_keys($results);
    }
}