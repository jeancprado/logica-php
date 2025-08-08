<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício V</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h3>Qual é o formato do parelelepídedo?</h3> 
        <p>insira as medidas abaixo para verificar</p> 

        <form action="index.php" method="post">

            <label for="comprimento">Comprimento:</label>
            <input type="number" name="comprimento"> 

            <label for="largura">Largura:</label>
            <input type="number" name="largura"> 

            <label for="altura">Altura:</label>
            <input type="number" name="altura"> 

            <button type="submit">Enviar</button> 

        </form>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $comprimento = $_POST['comprimento'];
        $largura = $_POST['largura'];
        $altura = $_POST['altura'];

        if ($comprimento == $largura && $largura == $altura) {
            echo $resultado = "Cubo";
        }   elseif ($comprimento == $largura || $comprimento == $altura || $largura == $altura) {
            echo  $resultado = "Paralelepípedo Retangular";
        }   else {
            echo $resultado = "Paralelepípedo Oblíquo";
        }
    }
?>

    </div>
</body>
</html>
