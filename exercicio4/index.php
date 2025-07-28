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
  </div>
</body>
</html>