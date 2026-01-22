<?php
include_once __DIR__ . "/conexao.php";

$goal = '';
$escada = [];

/* =========================
   PROCESSA O FORMULÁRIO
========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $goal = trim($_POST['goal'] ?? '');

    if ($goal !== '') {

        // Gera a escada com WHILE
        $i = 1;
        $tamanho = strlen($goal);

        while ($i <= $tamanho) {

            $linha = [];
            $j = 1;

            while ($j <= $i) {
                $linha[] = $goal;
                $j++;
            }

            $escada[] = implode(' ', $linha);
            $i++;
        }

        // Salva no banco
        $goal_sql = mysqli_real_escape_string($conexao, $goal);
        $date_time = date('Y-m-d H:i:s');

        $sqlInsert = "
            INSERT INTO exercicio12 (goal, date_time, newest_to_oldest)
            VALUES ('$goal_sql', '$date_time', 1)
        ";

        mysqli_query($conexao, $sqlInsert);


    }
}

/* =========================
   BUSCA HISTÓRICO
========================= */
$sqlSelect = "
    SELECT goal, date_time
    FROM exercicio12
    ORDER BY date_time DESC
";

$resultado = mysqli_query($conexao, $sqlSelect);

$historico = [];

while ($row = mysqli_fetch_assoc($resultado)) {
    $historico[] = $row;
}
?>