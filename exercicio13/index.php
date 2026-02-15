<?php
include_once "src/processamento.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">
            
    <link rel="stylesheet" href="css/style.css">
    <title>Exercício 13</title>
</head>

<body>
    
    <h3 class="h3">Controle de Temperaturas</h3>

    <?php if (!$resultadoFinal): ?>

    <form method="POST">
        <input type="text" name="temperature" placeholder="Digite a temperatura em °C" required>
        <button type="submit">Enviar</button>
    </form>

    <p>(Digite "999" para encerrar)</p>

    <div class="info">
        ❄️ Fria: abaixo de 15°C <br>
        🌤️ Agradável: 15°C até 30°C <br>
        🔥 Quente: acima de 30°C
    </div>

    <p class="erro"><?= $mensagem ?></p>


    <?php endif; ?>

    <?php
    if ($resultadoFinal):

        $total = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) as total FROM exercicio13"))["total"];

        $frias = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) as total FROM exercicio13 WHERE temperature < 15"))["total"];

        $agradaveis = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) as total FROM exercicio13 WHERE temperature BETWEEN 15 AND 30"))["total"];

        $quentes = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) as total FROM exercicio13 WHERE temperature > 30"))["total"];

        $media = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT AVG(temperature) as media FROM exercicio13"))["media"];

        $min = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT MIN(temperature) as min FROM exercicio13"))["min"];

        $max = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT MAX(temperature) as max FROM exercicio13"))["max"];

        $resultado = mysqli_query($conexao, "SELECT * FROM exercicio13 ORDER BY id ASC");
    ?>

    <h3>Resultados Finais</h3>

    <div class="resumo">
        Total: <?= $total ?><br>
        Frias: <?= $frias ?><br>
        Agradáveis: <?= $agradaveis ?><br>
        Quentes: <?= $quentes ?><br>
        Média: <?= number_format($media,1,',','.') ?>°C<br>
        Mínima: <?= number_format($min,1,',','.') ?>°C<br>
        Máxima: <?= number_format($max,1,',','.') ?>°C
    </div>

    <table>
    <tr>
    <th>#</th>
    <th>Temperatura</th>
    <th>Classificação</th>
    <th>Data</th>
    </tr>

    <?php
        $contador = 1;
        while ($row = mysqli_fetch_assoc($resultado)):
        
        $classe = "";
        if ($row["temperature"] < 15) $classe = "temp-fria";
        elseif ($row["temperature"] > 30) $classe = "temp-quente";
        else $classe = "temp-agradavel";
    ?>

    <tr class="<?= $classe ?>">
    <td><?= $contador++ ?></td>
    <td><?= number_format($row["temperature"],1,',','.') ?>°C</td>
    <td><?= $row["classification"] ?></td>
    <td><?= date("d/m/Y H:i:s", strtotime($row["registration_date"])) ?></td>
    </tr>

    <?php endwhile; ?>
    </table>

    <br>
    <a href="index.php?limpar=1" class="botao">Novo Teste</a>
    <a href="index.php" class="botao">Voltar</a>

    <?php endif; ?>

</body>
</html>
