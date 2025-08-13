<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exercício VI</title>
</head>
<body>
    <div class="container">
        <div class="imagem"></div>
        <h1>Descubra a Nota Musical</h1>
        <form method="post">
            <label for="numero">Número da Nota (1-10):</label>
            <input type="number" id="numero" name="numero" min="1" max="10" required>
            <button type="submit">Enviar</button>
        </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = $_POST["numero"];

        if (is_numeric($numero)) {
            $numero = (int)$numero;
            $nota = "";

            switch ($numero) {
                case 1:
                    $nota = "Dó";
                    break;
                case 2:
                    $nota = "Ré";
                    break;
                case 3:
                    $nota = "Mi";
                    break;
                case 4:
                    $nota = "Fá";
                    break;
                case 5:
                    $nota = "Sol";
                    break;
                case 6:
                    $nota = "Lá";
                    break;
                case 7:
                    $nota = "Si";
                    break;
                case 8:
                    $nota = "Dó#";
                    break;
                case 9:
                    $nota = "Ré#";
                    break;
                case 10:
                    $nota = "Fá#";
                    break;
                default:
                    $nota = "Número inválido. Insira um número entre 1 e 10.";
            }

                if ($nota) {
                    echo "<p class='resultado'>A nota musical correspondente é: " . $nota . "</p>";
                } else {
                    echo "<p class='resultado'>" . $nota . "</p>";
                }

            } else {
                echo "<p class='resultado'>Por favor, insira um número válido.</p>";
        }
    }
    ?>
    </div>
</body>
</html>
