<?php

$json_str = '{"empregados": '.
'[{ "nome":"Jason Jones", "idade":38, "sexo": "M" },'.
'{ "nome":"Ada Pascalina", "idade":35, "sexo": "F" },'.
'{ "nome":"Delphino da Silva", "idade":26, "sexo": "M" }'.
']}';


$jsonObj = json_decode($json_str);
$empregados = $jsonObj->empregados;

foreach ($empregados as $e) {
    echo "nome: $e->nome - idade: $e->idade - sexo: $e->sexo<br>";
}

?>