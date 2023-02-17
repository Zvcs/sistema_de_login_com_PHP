<?php

class Bd
{

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

    protected function cadastra(string $nome, string $senha): string
    {
        $conn = $this->conexao();

        $sql = "INSERT INTO usuarios (nome, senha) VALUES ('{$nome}', '{$senha}')";

        if (!mysqli_query($conn, $sql)) {
            return "<h1> Não foi possível cadastrar o usuário! Tente novamente </h1><br>
            Cadastre novamente a partir do botão:
            <button class=\"btn-group-toggle\"><a href=\"../Viewer/cadastrar.php\">Cadastrar</a></button>";
        }

        return "<h1> Usuário cadastrado com sucesso!</h1>";
    }

    protected function login(string $nome, string $senha): int
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
}
