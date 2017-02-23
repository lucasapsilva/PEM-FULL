<?php
    $host = "localhost";
    $user = "sa";
    $pass = "Cle12!@#";
    $banco = "LISTA_SP_AD";
    $conexao = mssql_connect($host, $user, $pass) or die(mssql_get_last_message());
    //mssql_select_db($banco) or die (mssql_get_last_message());