<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
    <link rel="stylesheet" href="exercicio2.style.css">
</head>
<body>
    <div class="container">
        <h4>Exercício II</h4>
        <form action="index.php" method="post">
            <label for="number">Digite qualquer número para saber se ele é divisível por 3, 4 ou 6</label>
                <div>
                    <input type="text" name="number">
                </div>
                <div>
                    <input type="submit" value="enviar">
                </div>
        </form>
        
<?php

$number = $_POST["number"]; 

if ($number % 3 == 0) {
    echo "O número $number é divisível por 3.";
}

elseif ($number % 4 == 0) {
    echo "O número $number é divisível por 4.";
} 

elseif ($number % 6 == 0) {
    echo "O número $number é divisível por 6.";
}

else {
    echo "O número $number não é divisível por 3, 4 ou 6.";
}

?>
    </div>
</body>
</html>