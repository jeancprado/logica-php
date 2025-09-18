<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exercício 8</title>
</head>
<body>
    <div class="container">
        <h1>Contador e Soma</h1>
        <form method="post">
            <input type="number" name="limite" placeholder="Número limite" required>
            <button type="submit">Calcular Soma</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $limite = intval($_POST["limite"]);
            $soma = 0;
            $sequencia = [];

            for ($i = 1; $i <= $limite; $i++) {
                $sequencia[] = $i;
                $soma += $i;
            }

            echo "<div class='resultado'>";
            echo "<p class='sequencia'><strong>Sequência:</strong> " . implode(", ", $sequencia) . "</p>";
            echo "<p><strong>Soma total:</strong> $soma</p>";
            echo "</div>";
        }
        ?>
        
    </div>
</body>
</html>
