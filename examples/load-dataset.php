<?php
require_once '../vendor/autoload.php';


$associate = new \Association\Association();
$associate->loadDataset('./data.set');

print_r($associate->getCombinations('Carne'));