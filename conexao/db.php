<?php
$host = "192.168.10.100";
$user = "sa";
$pass = "Lu01ccas";
$banco = "LISTA_SP_AD";
$conexao = new PDO ("dblib:host=" . $host . ";dbname=" . $banco . ";charset=utf8;", $user, $pass);
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(!isset($conexao))
    echo "Falha na conexão";

$consulta = $conexao->query("select distinct(TITLE) as empreendimento
from LISTA_SP_AD.dbo.TB_PWA_DPP_CADASTRO_EMPREENDIMENTOS 
order by TITLE asc");

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    // aqui eu mostro os valores de minha consulta
    echo "Empreendimento: {$linha['empreendimento']}<br />";
}
?>