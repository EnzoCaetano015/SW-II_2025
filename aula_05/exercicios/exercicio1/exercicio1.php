<?php

$dados = [
    "produto" => "Mouse",
    "preco" => 50,
    "quantidade" => 350
];

$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents("produtos.json", $json)

?>