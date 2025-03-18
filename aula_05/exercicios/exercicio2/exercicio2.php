<?php

$conteudo = file_get_contents("usuarios.json");
$dados = json_decode($conteudo, true);

print_r($dados);



?>