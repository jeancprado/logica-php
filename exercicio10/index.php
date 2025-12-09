<?php
    include "temperaturas.php";
    $print = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $print = temperaturas($_POST["data_medicao"], $_POST["temperatura"]);
    }

    $sql = "SELECT * FROM exercicio10 ORDER BY id DESC";
    $registros = mysqli_query($conexao, $sql);
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
                <input type="date" id="data_medicao" name="data_medicao">
                <label for="temperatura">Temperatura (°C) [-50°C a 60°C]:</label>
                <input type="number" id="temperatura" name="temperatura" step="0.1" min="-50" max="60" required >
                
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
                            $analise = classify_temperature($registro['temperatura']);
                            $data_formatada = (new DateTime($registro['data']))->format('d/m/Y');
                        ?>
                            <tr class="<?= $analise['css_class']; ?>">
                                <td><?= $data_formatada; ?></td>
                                <td><?= number_format($registro['temperatura'], 1); ?>°C</td>
                                <td class="classificacao-col"><?= $analise['classificacao']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

</html>
</body>
