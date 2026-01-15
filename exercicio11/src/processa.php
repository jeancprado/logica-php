<?php
require_once __DIR__ . '/conexao.php';

$resultado = null;

if (isset($_POST['numero'])) {
    $numero = intval($_POST['numero']);
    $dataHora = date('Y-m-d H:i:s');

    for ($i = 1; $i <= 10; $i++) {
        $multiplo = $numero * $i;

        $sqlInsert = "
            INSERT INTO exercicio11 (base_number, multiple, date_time)
            VALUES ($numero, $multiplo, '$dataHora')
        ";

        mysqli_query($conexao, $sqlInsert);
    }
}

$sqlSelect = "
    SELECT base_number, multiple, date_time
    FROM exercicio11
    ORDER BY date_time DESC, base_number DESC, multiple ASC
";

$resultado = mysqli_query($conexao, $sqlSelect);
