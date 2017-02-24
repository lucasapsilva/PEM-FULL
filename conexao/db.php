<?php
$host = "192.168.10.100";
$user = "sa";
$pass = "Lu01ccas";
$banco = "DPP_FIN";
$conexao = new PDO ("dblib:host=" . $host . ";dbname=" . $banco . ";charset=utf8;", $user, $pass);
if($conexao)
    echo "Conectado com sucesso!";
else
    echo "Falha na conexão!";
?>