<?php

function gerarNumerosAleatorios() {
    $numerosAleatorios = array();
    
    for ($i = 0; $i < 10; $i++) {
        $numerosAleatorios[] = rand(1, 100);
    }
    
    return $numerosAleatorios;
}

$numeros = gerarNumerosAleatorios();
print_r($numeros);

?>