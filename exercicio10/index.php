<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["measurement_date"];
    $temp = $_POST["temperature_recorded"];

    if (!empty($data) && $temp !== "") {
        // Previne injeção básica e monta a query
        $data_sql = mysqli_real_escape_string($conexao, $data);
        $temp_sql = mysqli_real_escape_string($conexao, $temp);

        $sql_insert = "INSERT INTO exercicio10 (measurement_date, temperature_recorded) VALUES ('$data_sql', '$temp_sql')";

        if (mysqli_query($conexao, $sql_insert)) {
            // Padrão PRG: Redireciona para evitar reenvio do formulário ao atualizar a página
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "<p style='color:red'>Erro ao inserir: " . mysqli_error($conexao) . "</p>";
        }
    }
}

// ==========================================================
// LÓGICA DE RECUPERAÇÃO E ESTATÍSTICAS
// ==========================================================
$sql = "SELECT * FROM exercicio10 ORDER BY measurement_date DESC";
$resultado = mysqli_query($conexao, $sql);

// Variáveis para as estatísticas
$soma_temperaturas = 0;
$qtd_baixa = 0;   // < 15
$qtd_normal = 0;  // >= 15 e <= 25
$qtd_alta = 0;    // > 25
$total_dias = 0;

// Array para guardar os dados processados para a tabela HTML
$dados_tabela = [];

while ($linha = mysqli_fetch_assoc($resultado)) {
    $temp = (float)$linha['temperature_recorded'];
    $data_db = $linha['measurement_date'];

    // 1. Processar Classificação e Cor (CSS)
    if ($temp < 15) {
        $classificacao = "Baixa";
        $classe_css = "baixa"; // Será usado na TR ou TD
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

    // 2. Acumular para média
    $soma_temperaturas += $temp;
    $total_dias++;

    // Guardar no array para exibir depois
    $dados_tabela[] = [
        'measurement_date' => date('d/m/Y', strtotime($data_db)),
        'temperature_recorded' => $temp,
        'classification' => $classificacao,
        'classe_css' => $classe_css
    ];
}

// Calcular Média Geral
$media_geral = ($total_dias > 0) ? ($soma_temperaturas / $total_dias) : 0;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Exercício 10</title>
</head>
<body>
<div class="container">
        
        <div class="secao-registro">
            <h2>Registrar Temperatura Diária</h2>
            <form method="POST" action="">
                
                <label for="data_medicao">Data da Medição:</label>
                <input type="date" id="measurement_date" name="measurement_date">
                <label for="temperature_recorded">Temperatura (°C) [-50°C a 60°C]:</label>
                <input type="number" id="temperature_recorded" name="temperature_recorded" step="0.1" min="-50" max="60" required >
                
                <button type="submit" >Registrar</button>
                
            </form>
        </div>

        <div class="secao-visualizacao">
            <h2>Histórico de Temperaturas</h2>
            
            <div class="resumo-estatistico">
                <h3>Resumo Estatístico (<?= $total_registros; ?> Dias)</h3>
                
                <div class="estatistica-item estatistica-media">
                    <span>Média Geral das Temperaturas:</span>
                    <span class="estatistica-valor"><?= number_format($estatisticas['media'], 1); ?>°C</span>
                </div>
                
                <div class="estatistica-item">
                    <span>Total de dias com temperatura **Baixa** (< 15°C):</span>
                    <span class="estatistica-valor baixa" style="color: #0288d1;"><?= $estatisticas['baixa_count']; ?></span>
                </div>
                
                <div class="estatistica-item">
                    <span>Total de dias com temperatura **Normal** (15°C a 25°C):</span>
                    <span class="estatistica-valor normal" style="color: #43a047;"><?= $estatisticas['normal_count']; ?></span>
                </div>
                
                <div class="estatistica-item">
                    <span>Total de dias com temperatura **Alta** (> 25°C):</span>
                    <span class="estatistica-valor alta" style="color: #d84315;"><?= $estatisticas['alta_count']; ?></span>
                </div>
            </div>

            <?php if ($total_registros === 0): ?>
                <div class="no-records">
                    Não há registros de temperatura no MySQL para exibição.
                </div>
            <?php else: ?>
                <table class="tabela-registros">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Temperatura (°C)</th>
                            <th class="classificacao-col">Classificação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registros as $registro): 
                            $analise = classify_temperature($registro['temperature_recorded']);
                            $data_formatada = (new DateTime($registro['data']))->format('d/m/Y');
                        ?>
                            <tr class="<?= $analise['css_class']; ?>">
                                <td><?= $data_formatada; ?></td>
                                <td><?= number_format($registro['temperature_recorded'], 1); ?>°C</td>
                                <td class="classificacao-col"><?= $analise['classificacao']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

</html>
</body>
