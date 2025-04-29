<?php

header("Content-Type: application/json; charset=UTF-8");

$metodo = $_SERVER['REQUEST_METHOD'];
$arquivo = 'usuarios.json';

if(!file_exists($arquivo)){
    file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

$usuarios = json_decode(file_get_contents($arquivo), true);

switch($metodo){

    case 'GET':
        if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $usuario_encontrado = null;
            foreach($usuarios as $u){
                if ($u['id'] == $id){
                    $usuario_encontrado = $u;
                    break;
                }
            }
            if($usuario_encontrado){
                echo json_encode($usuario_encontrado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }else{
                http_response_code(404);
                echo json_encode(["erro" => "Usuario não encontrado"], JSON_UNESCAPED_UNICODE);
            }
        }else{
            echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        break;

    case 'POST':
        $dados = json_decode(file_get_contents('php://input'), true);

        if(!isset($dados["nome"]) || !isset($dados["email"])){
            http_response_code(400);
            echo json_encode(["erro" => "Nome e Email são obrigatótios"], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $novo_id = 1;
        if(!empty($usuarios)){
            $ids = array_column($usuarios, 'id');
            $novo_id = max($ids) + 1;
        }

        $novo_usuario = [
            "id" => $novo_id,
            "nome" => $dados["nome"],
            "email" => $dados["email"]
        ];

        $usuarios[] = $novo_usuario;
        file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        echo json_encode(["mensagem" => "Usuario inserido com sucesso!", "usuario" => $novo_usuario], JSON_UNESCAPED_UNICODE);
        break;

    case 'PUT':
        // Atualizar um usuário
        $dados = json_decode(file_get_contents('php://input'), true);
        if(!isset($dados["id"]) || (!isset($dados["nome"]) && !isset($dados["email"]))){
            http_response_code(400);
            echo json_encode(["erro" => "ID e ao menos um dos campos Nome ou Email são obrigatórios"], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $id = intval($dados["id"]);
        $atualizado = false;
        foreach($usuarios as &$u){
            if($u['id'] === $id){
                if(isset($dados["nome"]))  $u['nome']  = $dados["nome"];
                if(isset($dados["email"])) $u['email'] = $dados["email"];
                $atualizado = true;
                $usuario_atual = $u;
                break;
            }
        }
        unset($u);

        if($atualizado){
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            echo json_encode(["mensagem" => "Usuario atualizado com sucesso!", "usuario" => $usuario_atual], JSON_UNESCAPED_UNICODE);
        }else{
            http_response_code(404);
            echo json_encode(["erro" => "Usuario não encontrado para atualização"], JSON_UNESCAPED_UNICODE);
        }
        break;

    case 'DELETE':
        // Deletar um usuário
        if(!isset($_GET['id'])){
            http_response_code(400);
            echo json_encode(["erro" => "ID do usuário é obrigatório para exclusão"], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $id = intval($_GET['id']);
        $encontrado = false;
        foreach($usuarios as $key => $u){
            if($u['id'] === $id){
                $encontrado = true;
                unset($usuarios[$key]);
                break;
            }
        }

        if($encontrado){
            // Reindexar array
            $usuarios = array_values($usuarios);
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            echo json_encode(["mensagem" => "Usuario removido com sucesso!"], JSON_UNESCAPED_UNICODE);
        }else{
            http_response_code(404);
            echo json_encode(["erro" => "Usuario não encontrado para exclusão"], JSON_UNESCAPED_UNICODE);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["erro" => "Método não permitido!"], JSON_UNESCAPED_UNICODE);
        break;
}

?>
