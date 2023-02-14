<?php

include_once ('bd.php');

$banco = new Bd();

$nome = $_POST['name'];
$senha = $_POST['password'];

$message = $banco->cadastra($nome, $senha);

echo $message;
?>

<!DOCTYPE html5>
<html>
    <head>
        <title>Resultado cadastro</title>
        <body>
        <button class="btn-group-toggle"><a href="../cadastrar.html">Cadastrar mais um usuário</a></button><br>
        <button class="btn-group-toggle"><a href="../index.html">Voltar a pagina inicial</a></button>
        </body>
    </head>
</html>
