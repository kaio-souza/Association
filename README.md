# Association
Apesar de atualmente o PHP não ser a melhor linguagem para processamento de dados massivos, este projeto é baseado em
alguns algoritimos de associação, similar ao processo do Algoritmo APRIORI

## Utilização
Instancie a classe `Association` informando um dataset
```php
use KaioSouza\Association\Association;

$dataset = [
    ['Carne', 'Queijo', 'Papel Higienico', 'Tomate'],
    ['Tomate', 'Carne'],
    ['Abacate', 'Carne', 'Fraldas'],
    ['Carne', 'Queijo', 'Leite', 'Tomate'],
    ['Tomate', 'Ovos','Leite'],
    ['Refrigerante', 'Cerveja', 'Fraldas'],
    ['Fraldas', 'Queijo', 'Papel Higienico', 'Tomate'],
    ['Tomate', 'Repolho'],
    ['Limão', 'Carne', 'Fraldas'],
];

$associate = new Association($dataset);
```
*** Neste exemplo nosso dataset cada entrada representa uma listagem de items que foram comprados juntos, 
utilizar Id's numéricos é mais realista, porem com texto o exemplo fica mais didático

## Descobrindo o item mais frequente do Dataset
```php
echo $associate->getMoreFrequentlyItem(); // Retorna apenas uma string com o Item mais frequente

// Returns: Tomate
```
## Retornando os itens mais frequentes

```php
echo $associate->getMoreFrequentlyItem(5); // Retorna uma array com no "MÁXIMO" 5 items mais frequentes

/** Returns: 
Array
(
    [0] => Tomate
    [1] => Carne
    [2] => Fraldas
    [3] => Queijo
    [4] => Papel Higienico
)
**/
```

## Exibindo o valor de Support (Métrica Estatistica utilizada na Associação)

```php
echo $associate->getMoreFrequentlyItem(3, true); // Retorna uma array com no "MÁXIMO" 3 items mais frequentes e as respectivas metricas de Support

/** Returns: 
Array
(
    [Tomate] => 0.66666666666667
    [Carne] => 0.55555555555556
    [Fraldas] => 0.44444444444444
)

**/
```


## Descobrindo o item que é mais combinado com um item especifico
```php
echo $associate->getCombinations('Carne'); // Retorna apenas uma string com o Item combinado mais frequentemente

// Returns: Tomate
```

## Retornando lista dos itens combinados mais frequentemente com um item especidico

```php
echo $associate->getCombinations('Carne', 5); // Retorna uma array com no "MÁXIMO" 5 items com combinação mais frequentes

/** Returns: 
Array
(
    [0] => Tomate
    [1] => Queijo
)

**/
```

## Exibindo o valor de Support (Métrica Estatistica utilizada na Associação)

```php
echo $associate->getCombinations('Tomate', 3, true); // Retorna uma array com no "MÁXIMO" 3 items com combinação mais frequentes e as respectivas metricas de Support

/** Returns: 
Array
(
    [Carne] => 0.33333333333333
    [Queijo] => 0.33333333333333
    [Papel Higienico] => 0.22222222222222
)


**/
```
