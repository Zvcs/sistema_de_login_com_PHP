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
            <button class=\"btn-group-toggle\"><a href=\"cadastrar.php\">Cadastrar</a></button>";
        }

        return $this->cadastra($this->nome, $this->senha);

    }

    public function realizaLogin(): void
    {
        $login = $this->login($this->nome, $this->senha);
        if ($login) {
            $_SESSION['nome'] = $this->nome;
            $_SESSION['senha'] = $this->senha;
            header('Location: ../home.php');
        }

        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        
    }

    public static function verificaLogin(): string
    {
        session_start();
        if (isset($_SESSION['nome']) == null || isset($_SESSION['senha']) == null) {
            $message = "<h1> É necessário fazer o login para acessar essa página</h1><br>
            <button class=\"btn-group-toggle\"><a href=\"login.php\">Login</a></button>";

            return $message;
        }

        $message = " <div class=\"container\">
        <div class=\"col-px-md-6\">
            <div class=\"configdiv\">
                <h3>Parabens voce acessou a pagina!</h3><br>
            </div>
        </div>
       <h1>Agora sai</h1><br>
       <button class=\"btn-group-toggle\"><a href=\"index.php\">Voltar a pagina inicial</a></button>
    </div>";

    return $message;
    }

    public static function killSession(): void
    {
        session_start();
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
    }
}