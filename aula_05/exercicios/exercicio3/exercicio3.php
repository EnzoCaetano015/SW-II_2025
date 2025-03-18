<?php

$conteudo = file_get_contents("produtos.json");
$dados = json_decode($conteudo, true);

$novo_produto = [
    "produto" => "Fone",
    "preco" => 40,
    "quantidade"=> 150
];

$dados[] = $novo_produto;

file_put_contents("produtos.json", json_encode($dados, JSON_PRETTY_PRINT));

echo "deu certo";

?>