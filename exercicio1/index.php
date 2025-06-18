<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bg-black">
        <div class="container">
            <h5>Exercício 01</h5>
            <form action="index.php" method="post">
                <label for="first-number">Digite o primeiro número</label>
                <input type="text" name="first-number"><br>
                <label for="second-number">Digite o segundo número</label>
                <input type="text" name="second-number"><br>
                <input type="submit" value="enviar">
            </form>
            <?php
                $value1 = $_POST['value1'];
                $value2 = $_POST['value2'];

                $total = $value1 + $value2;

                if ($total > 20) {
                    $total = $total + 8;
                }
                else {
                    $total = $total - 5;
                }
                echo "<div class='result'>0 resultado foi: $total</div>"
            ?>
        </div>
    </div>
</body>
</html>
