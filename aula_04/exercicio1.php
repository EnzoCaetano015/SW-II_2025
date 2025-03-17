<?php
$pessoa = [
    "nome" => "Carlos",
    "idade" => 30,
    "cidade" => "São Paulo"
];

$pessoa["profissao"] = "Desenvolvedor";

$amigos = ["João", "Maria", "Pedro"];

$dados = array_merge($pessoa, ["amigos" => $amigos]);

print_r($dados);

?>