<?php

$conteudo = file_get_contents("dados_exemplo10.json");
$dados = json_decode($conteudo, true);

print_r($dados);


?>