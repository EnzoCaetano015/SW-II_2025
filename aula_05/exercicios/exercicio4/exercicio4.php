<?php

$conteudo = file_get_contents("usuarios.json");

$dados = json_decode($conteudo, true);

$email_procurado = isset($_GET['email']) ? $_GET['email'] : "takinhoverycrazy@email.com";
  
$usuarios = $dados['usuarios'];

$usuario_encontrado = null;

foreach ($usuarios as $u) {
    if (isset($u["email"]) && $u["email"] === $email_procurado) {
        $usuario_encontrado = $u;
        break;
    }
}

if ($usuario_encontrado) {
    echo "Usuário encontrado: <br>";
    echo "ID: ".$usuario_encontrado["id"]."<br>";
    echo "Nome: ".$usuario_encontrado["nome"]."<br>";
    echo "Email: ".$usuario_encontrado["email"]."<br>";
   
} else {
    echo "Usuário com o email '$email_procurado' não encontrado.";
}

?>
