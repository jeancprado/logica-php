<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício IV</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <h2>Boletim do Aluno</h2>
        
        <form action="index.php" method="post">

            <label for="nota1">Nota 1</label>
            <input type="number" id="nota1" name="nota1" step="0.1" required><br><br>

            <label for="nota2">Nota 2</label>
            <input type="number" id="nota2" name="nota2" step="0.1" required><br><br>

            <label for="nota3">Nota 3</label>
            <input type="number" id="nota3" name="nota3" step="0.1" required><br><br>

            <button type="submit">Enviar</button>

        </form>

        <?php
        
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nota1 = ($_POST["nota1"]);
        $nota2 = ($_POST["nota2"]);
        $nota3 = ($_POST["nota3"]);

        $notas = [$nota1, $nota2, $nota3];
        sort($notas);

        $media = ($nota1 + $nota2 + $nota3) / 3;
    
        echo "<p> Notas em ordem crescente: " . $notas[0] . ", " . $notas[1] . ", " . $notas[2] . "</p>";

        if ($media < 5) { 
            $cor = "red";
            } 

            else {
            $cor = "green";
            }

        echo "<p> Média das notas: " . "<span style=\"color: $cor;\">" . number_format($media, 2, ',', '.') . "</span>" . "</p>";;
        
        }
        
        ?>
  </div>
</body>
</html>