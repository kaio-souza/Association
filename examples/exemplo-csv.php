<?php
require_once '../vendor/autoload.php';


$associate = new \Association\Association();


$associate->setDataset('./dataset1.csv');
print_r($associate->getMoreFrequentlyItem()); // 1 Item sem a estatistica de suporte
echo "\n";
