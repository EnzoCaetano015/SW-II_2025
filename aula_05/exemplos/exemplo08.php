<?php

$dados = [
    "nome" => "joão",
    "idade"=> 25,
    "email"=> "joao@email.com"
];

$json = json_encode($dados, JSON_PRETTY_PRINT);
echo $json;

?>