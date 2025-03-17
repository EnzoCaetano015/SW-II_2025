<?php

// PESQUISEI NOI STACKOVERFLOW PARA FAZER SEM O MIN E MAX DO PHP

$numeros = [15, 8, 22, 3, 17, 9, 31, 4];

$maior = $menor = $numeros[0];

foreach ($numeros as $numero) {
    if ($numero > $maior) {
        $maior = $numero;
    }
    if ($numero < $menor) {
        $menor = $numero;
    }
}

echo "O maior valor do array é: $maior\n";
echo "O menor valor do array é: $menor\n";

?>