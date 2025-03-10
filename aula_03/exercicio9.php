<?php
    function fatorial($n){
        if($n < 0){
            echo "Numero invalido";
        };

    $fatorial = 1;
    for ($i = 2; $i <= $n; $i++) {
        $fatorial *= $i;
    }

    echo "O fatorial de $n é: $fatorial";

    }

    fatorial(8);
?>