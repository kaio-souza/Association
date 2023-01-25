<?php


namespace Association\Services;


use Association\Exceptions\DatasetNotDefined;
use Association\Helpers\Importation;
use Association\Helpers\Statistics;
use Association\Validators\DatasetValidator;
use Association\Validators\InputsValidator;

class AssociationService
{
    private $dataset;
    private $threshold;
    public $supportList;

    const DEFAULT_THRESHOLD = 0.5;

    public function __construct($dataset = null, $threshold = null)
    {
        $this->threshold = $threshold ? InputsValidator::validateThreshold($threshold) : self::DEFAULT_THRESHOLD;

        if($this->dataset)
            $this->setDataset($dataset);
    }

    public function setDataset($dataset)
    {
        if(is_string($dataset) || is_resource($dataset))
            $dataset = Importation::csv2Array($dataset);

        $this->dataset = DatasetValidator::validateDataset($dataset);
        $this->createAssociations();
        return $this;
    }

    private function createAssociations()
    {

        $this->supportList = Statistics::createSupportList($this->dataset);
    }

    public function validateDataSet(){
        if(!$this->dataset && !$this->supportList)
            throw new DatasetNotDefined;
    }

}