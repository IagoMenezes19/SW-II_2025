<?php
header("Content-Type: application/json");

$metodo = $_SERVER['REQUEST_METHOD'];
$arquivo = 'usuarios.json';

if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

$usuarios = json_decode(file_get_contents($arquivo), true);

switch ($metodo) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $usuario_encontrado = null;

            foreach ($usuarios as $usuario) {
                if ($usuario['id'] == $id) {
                    $usuario_encontrado = $usuario;
                    break;
                }
            }

            if ($usuario_encontrado) {
                echo json_encode($usuario_encontrado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(404);
                echo json_encode(["erro" => "O usuário requerido não foi encontrado."], JSON_UNESCAPED_UNICODE);
            }
        } else {
            echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        break;

    case 'POST':
        $dados = json_decode(file_get_contents('php://input'), true);

        if (!isset($dados["nome"]) || !isset($dados["email"])) {
            http_response_code(400);
            echo json_encode(["erro" => "O nome e o email são obrigatórios, por favor."], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $novo_id = !empty($usuarios) ? max(array_column($usuarios, 'id')) + 1 : 1;

        $novoUsuario = [
            "id" => $novo_id,
            "nome" => $dados["nome"],
            "email" => $dados["email"]
        ];

        $usuarios[] = $novoUsuario;
        file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        echo json_encode([
            "mensagem" => "O usuário foi adicionado com sucesso.",
            "usuario" => $novoUsuario
        ], JSON_UNESCAPED_UNICODE);
        break;

    case 'PUT':
        parse_str($_SERVER['QUERY_STRING'], $params);
        if (!isset($params['id'])) {
            http_response_code(400);
            echo json_encode(["erro" => "ID do usuário é obrigatório para atualização."], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $id = intval($params['id']);
        $dados = json_decode(file_get_contents('php://input'), true);

        $usuarioAtualizado = null;
        foreach ($usuarios as &$usuario) {
            if ($usuario['id'] == $id) {
                if (isset($dados['nome'])) {
                    $usuario['nome'] = $dados['nome'];
                }
                if (isset($dados['email'])) {
                    $usuario['email'] = $dados['email'];
                }
                $usuarioAtualizado = $usuario;
                break;
            }
        }

        if ($usuarioAtualizado) {
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            echo json_encode([
                "mensagem" => "Usuário atualizado com sucesso.",
                "usuario" => $usuarioAtualizado
            ], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(404);
            echo json_encode(["erro" => "Usuário com ID especificado não foi encontrado."], JSON_UNESCAPED_UNICODE);
        }
        break;

    case 'DELETE':
        parse_str($_SERVER['QUERY_STRING'], $params);
        if (!isset($params['id'])) {
            http_response_code(400);
            echo json_encode(["erro" => "ID do usuário é obrigatório para exclusão."], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $id = intval($params['id']);
        $usuarioRemovido = false;

        foreach ($usuarios as $index => $usuario) {
            if ($usuario['id'] == $id) {
                unset($usuarios[$index]);
                $usuarioRemovido = true;
                break;
            }
        }

        if ($usuarioRemovido) {
            $usuarios = array_values($usuarios); // Reindexar o array
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            echo json_encode(["mensagem" => "Usuário removido com sucesso."], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(404);
            echo json_encode(["erro" => "Usuário com ID especificado não foi encontrado."], JSON_UNESCAPED_UNICODE);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["erro" => "O método requerido não é permitido"], JSON_UNESCAPED_UNICODE);
        break;
}
