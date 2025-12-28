<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 11</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="container">
    <h1>Dez Primeiros Múltiplos</h1>

    <form action="processa.php" method="POST">
        <input type="number" name="numero" placeholder="Digite um número" required>
        <button type="submit">Calcular</button>
    </form>

    <div class="lista">
        <h2>Múltiplos Calculados</h2>
        <ul>
            <?php while($row = $resultado->fetch_assoc()): ?>
                <li><?= $row['numero_base'] ?> x = <?= $row['multiplo'] ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>

</body>
</html>