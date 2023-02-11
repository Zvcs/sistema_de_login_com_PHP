<?php

$name = $_POST['name'];
$password = MD5($_POST['password']);

$connect = mysql_connect(COLOCAR O NOME DO SERVIDOR, 'root' , '');
$db = mysql_select_db('cadastro_usuarios');
$query_select = "SELECT name FROM usuarios WHERE name = {$login}";
$select = mysql_query($query_select);
$arr = mysql_fetch_array($select);
$logarray = $arr['name'];

$nomevalido = isInvalidated($name, $logarray);

$cadastrado = insertDB(string $login, string $password)


function isInvalidated (string $name, ?string $logarray): string
{
    if ($login == '' || $login == null)
    {
        $message =  "<script language='javascript' type='text/javascript'>
        alert('O campo login deve ser preenchido');window.location.href='
        cadastro.html';</script>";
        return $message;
    }

    if ($logarray == $login): string
    {
        $message = "<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='
        cadastro.html';</script>";
        return $message;
    }
    //isso precisa mudar =)

    $message = "<script language='javascript' type='text/javascript'>
    alert('Nome de usuario válido!');window.location.href='
    cadastro.html';</script>";

    return $message;
}


function insertDB (string $login, string $password): string
{
    $query = "INSERT INTO usuarios (name, password) VALUES ({$login}, {$senha})";
    $insert = mysql_query ($query, $connect);

    if ($insert){
        $message = "<script language='javascript' type='text/javascript'>
        alert('Usuário cadastrado com sucesso!');window.location.
        href='login.html'</script>";
        return $message;
    }

    $message = "<script language='javascript' type='text/javascript'>
    alert('Não foi possível cadastrar esse usuário');window.location
    .href='cadastro.html'</script>";

    return $message;
}