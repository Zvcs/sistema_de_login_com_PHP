<?php

class Bd
{

    public const NOME = null;
    public const SENHA = null;

    private function conexao()
    {
        $serverhost = 'localhost';
        $servername = 'login';
        $user = 'root';
        $password = '';
        $conn = new mysqli($serverhost, $user, $password, $servername);

        if ($conn->connect_error) {
            die("Connection failed: "
        . $conn->connect_error);
        }

        return $conn;
    }

    public function cadastra(string $nome, string $senha): string
    {
        $conn = $this->conexao();

        if ($nome == '' || $nome == NULL || $senha == '' || $senha == NULL) {
            return "<h1> Usuário ou senha inválidos, por favor tente novamente!</h1><br>
            Cadastre novamente a partir do botão:
            <button class=\"btn-group-toggle\"><a href=\"cadastrar.php\">Cadastrar</a></button>";
        }

        $sql = "INSERT INTO usuarios (nome, senha) VALUES ('{$nome}', '{$senha}')";

        if (!mysqli_query($conn, $sql)) {
            return "<h1> Não foi possível cadastrar o usuário! Tente novamente </h1><br>
            Cadastre novamente a partir do botão:
            <button class=\"btn-group-toggle\"><a href=\"cadastrar.php\">Cadastrar</a></button>";
        }

        return "<h1> Usuário cadastrado com sucesso!</h1>";
    }

    public function login(string $nome, string $senha): int
    {
        session_start();
        $conn = $this->conexao();

        $sql = "SELECT * FROM usuarios where nome = '{$nome}' AND senha = '{$senha}'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            return 1;
        }

        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        return 0;
    }

    public function killSession(): void
    {
        session_start();
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
    }

    public function verifySession(): string
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

}