<?php
    $nota1 = 5;
    $nota2 = 2;
    $nota3 = 9;
    $nota4 = 8;

    $resul = $nota1 + $nota2 + $nota3 + $nota4;
    $media = $resul / 4;

    function verificarAprovacao($media){
        if($media >= 5){
            return "Aprovado";
        } else{
            return "Reprovado";
        };
    };

    $passou = verificarAprovacao($media);

    echo "Média: " . $media . "<br>";
    echo "Você está " . $passou;

?>