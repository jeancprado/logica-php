<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercício 9</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Repetidor de Palavra</h1>
        <form method="post">
            <input type="text" name="palavra" placeholder="Digite a palavra" required>
            <input type="number" name="vezes" placeholder="Número de repetições" required>
            <button type="submit">Repetir Palavra</button>
        </form>
        <div class="resultado">
        <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $palavra = htmlspecialchars($_POST["palavra"]);
                $vezes = intval($_POST["vezes"]);

                for ($i = 1; $i <= $vezes; $i++) {
                    echo "<p>$i - $palavra</p>";
                }
            }
        ?>
        </div>
    </div>
</body>
</html>
