<?php

include_once ('bd.php');

$nome = $_POST['name'];
$senha = $_POST['password'];

$banco = new Bd();

$validar = $banco->login($nome, $senha);

if ($validar == 1) {
  header("Location: ../home.html");
}

echo "<h1> Usuario nao cadastrado</h1><br>
Cadastre um novo usuario ou senha incorreta:
<button class=\"btn-group-toggle\"><a href=\"../cadastrar.html\">Cadastrar</a></button>
<button class=\"btn-group-toggle\"><a href=\"../login.html\">Login</a></button>";
?>

<!DOCTYPE html5>
<html>
    <head>
        <title>login</title>
        <body>
        </body>
    </head>
</html>
