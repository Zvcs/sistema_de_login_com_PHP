<?php

include_once ('bd.php');

class Pessoa extends Bd
{
    public function __construct(private string $nome, private string $senha) {
        $this->nome = $nome;
        $this->senha = $senha;
    }

    public function cadastraPessoa(): string
    {
        if ($this->nome == '' || $this->nome == null || $this->senha == '' || $this->senha == null) {
            return "<h1> Usuário ou senha inválidos, por favor tente novamente!</h1><br>
            Cadastre novamente a partir do botão:
            <button class=\"btn-group-toggle\"><a href=\"../Viewer/cadastrar.php\">Cadastrar</a></button>";
        }

        return $this->cadastra($this->nome, $this->senha);

    }

    public function realizaLogin(): void
    {
        $login = $this->login($this->nome, $this->senha);
        if ($login) {
            $_SESSION['nome'] = $this->nome;
            $_SESSION['senha'] = $this->senha;
            header('Location: ../Viewer/home.php');
            exit;
        }

        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        
    }
}