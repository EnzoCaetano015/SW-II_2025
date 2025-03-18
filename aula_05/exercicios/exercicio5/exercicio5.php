<?php

$conteudo = file_get_contents("produtos.json");
$dados = json_decode($conteudo, true);
$produto_remover = isset($_GET['produto']) ? $_GET['produto'] : "Mouse";

$produtos_filtrados = array_filter($dados, function ($produto) use ($produto_remover) {
    return isset($produto["produto"]) && $produto["produto"] !== $produto_remover;
});

file_put_contents("produtos.json", json_encode($produtos_filtrados, JSON_PRETTY_PRINT));

echo "deu certo";

?>