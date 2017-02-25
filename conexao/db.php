<?php


function Conectar(){
    try {
        $host = "192.168.10.100";
        $user = "sa";
        $pass = "Lu01ccas";
        $banco = "LISTA_SP_AD";
        $conexao = new PDO ("dblib:host=" . $host . ";dbname=" . $banco . ";charset=utf8;", $user, $pass, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_CASE => PDO::CASE_UPPER
            )
        );
        return $conexao;
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
        return null;
    }
}
?>