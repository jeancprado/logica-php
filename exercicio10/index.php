<?php
include "src/temperaturas.php";
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

    <div class="linha-superior">

        <div class="secao secao-registro">
            <h2>Registrar Temperatura Diária</h2>
            <form method="POST" action="">
                
                <label for="measurement_date">Data da Medição:</label>
                <input type="date" id="measurement_date" name="measurement_date">

                <label for="temperature_recorded">
                    Temperatura (°C) [-50°C a 60°C]:
                </label>
                <input type="number"
                       id="temperature_recorded"
                       name="temperature_recorded"
                       step="0.1"
                       min="-50"
                       max="60"
                       required>

                <button type="submit">Registrar</button>
            </form>
        </div>

        <div class="secao secao-resumo">
            <h2>Resumo Estatístico</h2>

            <div class="resumo-estatistico">
                <h3><?= $total_registros ?> dias registrados</h3>

                <div class="estatistica-item estatistica-media">
                    <span>Média Geral:</span>
                    <span class="estatistica-valor">
                        <?= number_format($estatisticas['media'], 1) ?>°C
                    </span>
                </div>

                <div class="estatistica-item">
                    <span>Temperaturas Baixas (&lt; 15°C):</span>
                    <span class="estatistica-valor baixa">
                        <?= $estatisticas['baixa_count'] ?>
                    </span>
                </div>

                <div class="estatistica-item">
                    <span>Temperaturas Normais (15–25°C):</span>
                    <span class="estatistica-valor normal">
                        <?= $estatisticas['normal_count'] ?>
                    </span>
                </div>

                <div class="estatistica-item">
                    <span>Temperaturas Altas (&gt; 25°C):</span>
                    <span class="estatistica-valor alta">
                        <?= $estatisticas['alta_count'] ?>
                    </span>
                </div>
            </div>
        </div>

    </div>

    <div class="secao secao-historico">
        <h2>Histórico de Temperaturas</h2>

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
                <?php foreach ($registros as $registro): ?>
                    <tr class="<?= $registro['classe_css'] ?>">
                        <td><?= $registro['measurement_date'] ?></td>
                        <td><?= number_format($registro['temperature_recorded'], 1) ?>°C</td>
                        <td class="classificacao-col">
                            <?= $registro['classification'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</div>

</html>
</body>
