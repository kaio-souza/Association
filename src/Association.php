<?php

namespace Association;

use Association\Exceptions\InvalidInputToAssociate;
use Association\Helpers\Importation;
use Association\Services\AssociationService;

class Association
{
    private $associationService;

    public function __construct($dataset = null, $threshold = null)
    {

        $this->associationService = new AssociationService($dataset, $threshold);
    }

    public function getMoreFrequentlyItem($length = 1, $showSupportValue = false)
    {
        $this->associationService->validateDataSet();
        $results = array_slice($this->associationService->supportList[0], 0, $length);

        if ($length == 1 && !$showSupportValue)
            return array_key_first($results);

        return $showSupportValue ? $results : array_keys($results);
    }

    public function getCombinations($value, $length = 1, $showSupportValue = false)
    {
        $this->associationService->validateDataSet();

        if (!isset($this->associationService->supportList[1][$value]))
            throw new InvalidInputToAssociate;

        $results = array_slice($this->associationService->supportList[1][$value], 0, $length);

        if ($length == 1 && !$showSupportValue)
            return array_key_first($results);

        return $showSupportValue ? $results : array_keys($results);
    }

    public function setDataset( $dataset){
        $this->associationService->setDataset($dataset);
        return $this;
    }


}