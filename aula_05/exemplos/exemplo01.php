<?php

    $json_str = '{"nome":"Caetano", "idade":17,"sexo":"muito macho"}';

    $obj = json_decode($json_str);

    echo "nome: $obj->nome<br>";
    echo "nome: $obj->idade<br>";
    echo "nome: $obj->sexo<br>";


?>