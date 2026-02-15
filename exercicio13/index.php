<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">
            
    <link rel="stylesheet" href="css/style.css">
    <title>Exercício 13</title>
</head>
<body>
    
    <h3 class="h3">Controle de Temperaturas</h3>

    <form method="POST">
        <input type="text" name="temperature" placeholder="Digite a temperatura em °C" required>
        <button type="submit">Enviar</button>
    </form>

    <p>(Digite "999" para encerrar)</p>

    <div class="info">
        ❄️ Fria: abaixo de 15°C <br>
        🌤️ Agradável: 15°C até 30°C <br>
        🔥 Quente: acima de 30°C
    </div>

</body>
</html>