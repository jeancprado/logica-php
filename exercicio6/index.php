<?php
    include "src/notaMusical.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $print = notaMusical($_POST["numero"]);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Exercício 6</title>
</head>
<body>
    <div class="container">
        <div class="imagem"></div>
        <h1>Descubra a Nota Musical</h1>
        <form method="post">
            <label for="numero">Número da Nota (de: 1 a 10):</label>
            <input type="number" id="numero" name="numero" min="1" max="10" required>
            <button type="submit">Enviar</button>
        </form>
    
        <div class="resultado">
            <?= isset($print) ? $print : '' ?>
        </div>
    
    </div>
</body>
</html>
