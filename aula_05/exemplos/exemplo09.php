<?php

$json = '{"nome":"Jason Jones", "idade":38, "email": "enzo@email.com"}';

$dados = json_decode($json, true);
print_r($dados);


?>