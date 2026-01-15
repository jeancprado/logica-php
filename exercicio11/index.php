<?php
$resultado = null;
include "src/processa.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 11 - Calculadora de Múltiplos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Dez Primeiros Múltiplos</h1>

    <form action="index.php" method="POST">
        <label>Digite qualquer número e ele será multiplicado do 1 ao 10</label>
        <input type="number" name="numero" placeholder="Digite um número" required>
        <button type="submit">Calcular</button>
    </form>

    <div class="lista">
        <h2>Múltiplos Calculados</h2>
        <ul>
            <?php if ($resultado && $resultado->num_rows > 0): ?>

                <?php
                $contador = 1;
                $ultimoBase = null;
                ?>

                <?php while ($row = $resultado->fetch_assoc()): ?>

                    <?php
                    if ($ultimoBase !== $row['base_number']) {
                        $contador = 1;
                        $ultimoBase = $row['base_number'];
                    }
                    ?>

                    <li>
                        <?= $row['base_number'] ?> x <?= $contador ?> = <?= $row['multiple'] ?>
                        <br>
                        <small>
                            Calculado em:
                            <?= date('d/m/Y H:i:s', strtotime($row['date_time'])) ?>
                        </small>
                    </li>

                    <?php $contador++; ?>

                <?php endwhile; ?>

            <?php else: ?>
                <li>Nenhum múltiplo calculado ainda.</li>
            <?php endif; ?>
        </ul>
    </div>
</div>
</body>
</html>
