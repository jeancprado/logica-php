<?php
include_once "conexao.php";

$total_registros = 0;

$estatisticas = [
    'media' => 0,
    'baixa_count' => 0,
    'normal_count' => 0,
    'alta_count' => 0
];

$registros = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = $_POST["measurement_date"] ?? '';
    $temp = $_POST["temperature_recorded"] ?? '';

    if ($data !== '' && $temp !== '') {
        $temp = (float) $temp;

        $resultadoClassificacao = classify_temperature($temp);
        $classificacao = $resultadoClassificacao['classificacao'];

        $data_sql = mysqli_real_escape_string($conexao, $data);
        $temp_sql = mysqli_real_escape_string($conexao, $temp);
        $classificacao_sql = mysqli_real_escape_string($conexao, $classificacao);

        $sql_insert = "
            INSERT INTO exercicio10
                (measurement_date, temperature_recorded, classification)
            VALUES
                ('$data_sql', '$temp_sql', '$classificacao_sql')
        ";

        if (!mysqli_query($conexao, $sql_insert)) {
            die("Erro no INSERT: " . mysqli_error($conexao));
        }

        header("Location: /exercicio10/index.php");
        exit;
    }
}

$sql = "SELECT * FROM exercicio10 ORDER BY measurement_date DESC, id DESC";
$resultado = mysqli_query($conexao, $sql);

$soma_temperaturas = 0;
$qtd_baixa = 0;
$qtd_normal = 0;
$qtd_alta = 0;
$total_dias = 0;

$dados_tabela = [];

while ($linha = mysqli_fetch_assoc($resultado)) {
    $temp = (float) $linha['temperature_recorded'];
    $data_db = $linha['measurement_date'];
    $classificacao = $linha['classification'];

    if ($classificacao === 'Baixa') {
        $classe_css = 'baixa';
        $qtd_baixa++;
    } elseif ($classificacao === 'Alta') {
        $classe_css = 'alta';
        $qtd_alta++;
    } else {
        $classe_css = 'normal';
        $qtd_normal++;
    }

    $soma_temperaturas += $temp;
    $total_dias++;

    $dados_tabela[] = [
        'measurement_date' => date('d/m/Y', strtotime($data_db)),
        'temperature_recorded' => $temp,
        'classification' => $classificacao,
        'classe_css' => $classe_css
    ];
}

$media_geral = ($total_dias > 0)
    ? ($soma_temperaturas / $total_dias)
    : 0;

$estatisticas = [
    'media' => $media_geral,
    'baixa_count' => $qtd_baixa,
    'normal_count' => $qtd_normal,
    'alta_count' => $qtd_alta
];

$registros = $dados_tabela;
$total_registros = $total_dias;

function classify_temperature(float $temp): array
{
    if ($temp < 15) {
        return ['classificacao' => 'Baixa'];
    }

    if ($temp > 25) {
        return ['classificacao' => 'Alta'];
    }

    return ['classificacao' => 'Normal'];
}
