<?php

$numeros = [12, 7, 5, 20, 33, 18, 9, 42, 55, 27, 16, 8, 39, 24, 30];

$pares = 0;
$impares = 0;

foreach ($numeros as $numero) {
    if ($numero % 2 == 0) {
        $pares++;
    } else {
        $impares++;
    }
}

echo "Quantidade de números pares: $pares\n";
echo "Quantidade de números ímpares: $impares\n";

?>