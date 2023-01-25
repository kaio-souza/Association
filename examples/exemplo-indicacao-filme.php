<?php
require_once '../vendor/autoload.php';


$dataset = [
    ['Carne', 'Queijo', 'Papel Higienico', 'Tomate'],
    ['Tomate', 'Carne'],
    ['Abacate', 'Carne', 'Fraldas'],
    ['Carne', 'Queijo', 'Leite', 'Tomate'],
    ['Tomate', 'Ovos', 'Leite'],
    ['Refrigerante', 'Cerveja', 'Fraldas'],
    ['Fraldas', 'Queijo', 'Papel Higienico', 'Tomate'],
    ['Tomate', 'Repolho'],
    ['Limão', 'Carne', 'Fraldas'],
];

$associate = new \Association\Association();

$associate->setDataset($dataset);
print_r($associate->getMoreFrequentlyItem()); // 1 Item sem a estatistica de suporte
echo "\n";

print_r($associate->getMoreFrequentlyItem(5)); //5 Itens sem a estatistica de suporte
echo "\n";

print_r($associate->getMoreFrequentlyItem(3, true)); // 3 Item com a estatistica de suporte
echo "\n";


print_r($associate->getCombinations('Carne'));
echo "\n";

print_r($associate->getCombinations('Carne', 2));
echo "\n";

print_r($associate->getCombinations('Carne', 3, true));