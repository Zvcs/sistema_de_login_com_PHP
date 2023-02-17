<?php

class Sessao
{
    public static function verificaLogin(): string
    {
        session_start();
        if (isset($_SESSION['nome']) == null || isset($_SESSION['senha']) == null) {
            $message = "<h1> É necessário fazer o login para acessar essa página</h1><br>
            <button class=\"btn-group-toggle\"><a href=\"../Viewer/login.php\">Login</a></button>";

            return $message;
        }

        $message = " <div class=\"container\">
        <div class=\"col-px-md-6\">
            <div class=\"configdiv\">
                <h3>Parabens voce acessou a pagina!</h3><br>
            </div>
        </div>
       <h1>Agora sai</h1><br>
       <button class=\"btn-group-toggle\"><a href=\"../Viewer/index.php\">Voltar a pagina inicial</a></button>
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