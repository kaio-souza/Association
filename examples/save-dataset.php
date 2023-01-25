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

$associate->saveDataset('./data.set');