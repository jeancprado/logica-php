<?php
include_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["measurement_date"];
    $temp = $_POST["temperature_recorded"];

    if (!empty($data) && $temp !== "") {
        $data_sql = mysqli_real_escape_string($conexao, $data);
        $temp_sql = mysqli_real_escape_string($conexao, $temp);

        $sql_insert = "INSERT INTO exercicio10 (measurement_date, temperature_recorded) VALUES ('$data_sql', '$temp_sql')";

        if (mysqli_query($conexao, $sql_insert)) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "<p style='color:red'>Erro ao inserir: " . mysqli_error($conexao) . "</p>";
        }
    }
}

$sql = "SELECT * FROM exercicio10 ORDER BY measurement_date DESC";
$resultado = mysqli_query($conexao, $sql);

$soma_temperaturas = 0;
$qtd_baixa = 0;
$qtd_normal = 0;
$qtd_alta = 0;
$total_dias = 0;

$dados_tabela = [];

while ($linha = mysqli_fetch_assoc($resultado)) {
    $temp = (float)$linha['temperature_recorded'];
    $data_db = $linha['measurement_date'];

    if ($temp < 15) {
        $classificacao = "Baixa";
        $classe_css = "baixa"; 
        $qtd_baixa++;
    } elseif ($temp > 25) {
        $classificacao = "Alta";
        $classe_css = "alta";
        $qtd_alta++;
    } else {
        $classificacao = "Normal";
        $classe_css = "normal";
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

$media_geral = ($total_dias > 0) ? ($soma_temperaturas / $total_dias) : 0;

$total_registros = $total_dias;

$estatisticas = [
    'media' => $media_geral,
    'baixa_count' => $qtd_baixa,
    'normal_count' => $qtd_normal,
    'alta_count' => $qtd_alta
];

$registros = $dados_tabela;

function classify_temperature(float $temp): array {
    if ($temp < 15) {
        return [
            'classificacao' => 'Baixa',
            'css_class' => 'baixa'
        ];
    } elseif ($temp > 25) {
        return [
            'classificacao' => 'Alta',
            'css_class' => 'alta'
        ];
    } else {
        return [
            'classificacao' => 'Normal',
            'css_class' => 'normal'
        ];
    }
}

?>