<?php

$dbHost = 'db';
$dbUser = 'user';
$dbPassword = 'password';
$dbName = 'exercicio_dados';

$conexao = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conexao) {
    echo "Erro: " . mysqli_connect_error();
} else {
    echo "Conexão efetuada com sucesso";
}

?>