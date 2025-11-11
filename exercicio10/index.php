
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Exercício 10</title>
</head>
<body>
    <div class="container">
        <h2>Registrar Temperatura Diária</h2>

        <form id="formTemperatura">
            <div>
                <label for="data">Data da medição:</label><br>
                <input type="date" id="data" required>
            </div>

            <div>
                <label for="temperatura">Temperatura (°C):</label><br>
                <input type="number" id="temperatura" step="0.1" min="-50" max="60" required placeholder="Ex: 22.5">
            </div>

            <button type="submit">Registrar</button>
        </form>

        <p class="mensagem" id="mensagem"></p>
    </div>
</body>
