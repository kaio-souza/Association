<?php


namespace KaioSouza\Association\Services;


use KaioSouza\Association\Helpers\Statistics;
use KaioSouza\Association\Validators\DatasetValidator;
use KaioSouza\Association\Validators\InputsValidator;

class AssociationService
{
    private $dataset;
    private $threshold;
    public $supportList;

    const DEFAULT_THRESHOLD = 0.5;

    public function __construct($dataset = null, $threshold = null)
    {
        $this->threshold = $threshold ? InputsValidator::validateThreshold($threshold) : self::DEFAULT_THRESHOLD;
        $this->setDataset($dataset);
    }

    public function setDataset($dataset)
    {
        $this->dataset = DatasetValidator::validateDataset($dataset);
        $this->createAssociations();
        return $this;
    }

    private function createAssociations()
    {
        $this->supportList = Statistics::createSupportList($this->dataset);
    }


}