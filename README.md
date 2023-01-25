# Association
Apesar de atualmente o PHP não ser a melhor linguagem para processamento de dados massivos, este projeto é baseado em
alguns algoritimos de associação, similar ao processo do Algoritmo APRIORI

## Utilização
Instancie a classe `Association` informando um dataset
```php
use Association\Association;

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

/*** 
 * Neste exemplo nosso dataset cada entrada representa uma listagem de items que foram comprados juntos, 
 * utilizar Id's numéricos é mais realista, porem com texto o exemplo fica mais didático
**/
```

ou instacie a classe sem parametros e defina um dataset posteriormente

```php
use Association\Association;

$associate = new Association();
```

## Definido um dataset posteriormente

```php
// Através de uma array
$array = [
    ['Carne', 'Queijo', 'Papel Higienico', 'Tomate'],
    ['Tomate', 'Carne'],
    ['Abacate', 'Carne', 'Fraldas'],
];
$associate->setDataset($array);
```

```php
//Através do caminho de um CSV
$associate->setDataset('./path_to_file.csv');
```

```php
//Através de um resource CSV
$file = fopen('./dataset.csv', 'r');
$associate->setDataset($file);
```



## Descobrindo o item mais frequente do Dataset
```php
// Retorna apenas uma string com o Item mais frequente
echo $associate->getMoreFrequentlyItem(); 

// Returns: Tomate
```
## Retornando os itens mais frequentes

```php
// Retorna uma array com no "MÁXIMO" 5 items mais frequentes
echo $associate->getMoreFrequentlyItem(5); 

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
// Retorna uma array com no "MÁXIMO" 3 items mais frequentes e as respectivas metricas de Support
echo $associate->getMoreFrequentlyItem(3, true); 

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
// Retorna apenas uma string com o Item combinado mais frequentemente
echo $associate->getCombinations('Carne'); 

// Returns: Tomate
```

## Retornando lista dos itens combinados mais frequentemente com um item especidico

```php
// Retorna uma array com no "MÁXIMO" 5 items com combinação mais frequentes
echo $associate->getCombinations('Carne', 5); 

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
// Retorna uma array com no "MÁXIMO" 3 items com combinação mais frequentes e as respectivas metricas de Support
echo $associate->getCombinations('Tomate', 3, true); 

/** Returns: 
Array
(
    [Carne] => 0.33333333333333
    [Queijo] => 0.33333333333333
    [Papel Higienico] => 0.22222222222222
)


**/
```


## Salvando e carregando dados processados
Para salvar, após ter carregado o Dataset, basta chamar o método saveDataset informando o caminho onde salvaremos o Dataset processado
```php
$associate->saveDataset('./path_to_save_data');
````

```php
$associate = new \Association\Association();
$associate->loadDataset('./path_to_saved_file');

// Após carregar a informação processada é só utilizar...
print_r($associate->getCombinations('Carne'));
````


