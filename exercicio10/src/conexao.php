<?php

$dbHost = 'db';
$dbUser = 'user';
$dbPassword = 'password';
$dbName = 'exercicio_dados';

$conexao = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conexao) {
    die ("Erro Crítico de Conexão: " . mysqli_connect_error());
}
