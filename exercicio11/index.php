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
        <input type="number" name="numero" placeholder="Digite um número" required>
        <button type="submit">Calcular</button>
    </form>

    <div class="lista">
        <h2>Múltiplos Calculados</h2>
        <ul>
            <?php if ($resultado && $resultado->num_rows > 0): ?>
                <?php while ($row = $resultado->fetch_assoc()): ?>
                    <li>
                        <?= $row['base_number'] ?> → <?= $row['multiple'] ?>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <li>Nenhum múltiplo calculado ainda.</li>
            <?php endif; ?>
        </ul>
    </div>
</div>
</body>
</html>
