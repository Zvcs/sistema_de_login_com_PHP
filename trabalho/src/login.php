<?php

$name = $_POST['name'];
$entrar = $_POST['entrar'];
$password = md5($_POST['password']);

$connect = mysql_connect('nome_do_servidor','root','');
$db = mysql_select_db('nome_do_banco_de_dados');
  if (isset($entrar)) {
    //AARUMAR
    $verifica = mysql_query("SELECT * FROM usuarios WHERE name =
    '$name' AND password = '$password'") or die("erro ao selecionar");
      if (mysql_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();
      }else {
        setcookie("login",$login);
        header("Location:index.php");
      }
  }