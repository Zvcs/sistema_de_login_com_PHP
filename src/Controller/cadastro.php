<?php

include_once('../Model/pessoa.php');
include_once('../Model/sessao.php');

$nome = $_POST['name'];
$senha = $_POST['password'];

$pessoa = new Pessoa($nome, $senha);

$message = $pessoa->cadastraPessoa();

Sessao::killSession();

echo $message;
?>

<!DOCTYPE html5>
<html>
    <head>
        <title>Resultado cadastro</title>
        <body>
        <button class="btn-group-toggle"><a href="../Viewer/cadastrar.php">Cadastrar mais um usuário</a></button><br>
        <button class="btn-group-toggle"><a href="../Viewer/index.php">Voltar a pagina inicial</a></button>
        </body>
    </head>
</html>
