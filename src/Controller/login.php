<?php

include_once ('../Model/pessoa.php');

$nome = $_POST['name'];
$senha = $_POST['password'];

$pessoa = new Pessoa($nome, $senha);

$message =  $pessoa->realizaLogin();

echo "<h1> Usuario nao cadastrado</h1><br>
Cadastre um novo usuario ou senha incorreta:
<button class=\"btn-group-toggle\"><a href=\"../Viewer/cadastrar.php\">Cadastrar</a></button>
<button class=\"btn-group-toggle\"><a href=\"../Viewer/login.php\">Login</a></button>";
?>

<!DOCTYPE html5>
<html>
    <head>
        <title>login</title>
        <body>
        </body>
    </head>
</html>
