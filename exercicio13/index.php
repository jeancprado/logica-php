<?php include_once "src/conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Exercício 13 - jQuery</title>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/materialize.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>

<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <div class="card">

        <h3> Controle de Temperaturas</h3>

        <div class="input-group">
            <input type="text" id="temperature" placeholder="Digite a temperatura em °C">
            <button id="enviar">Enviar</button>
        </div>

        <p class="info">
            (Digite <strong>999</strong> para finalizar)
        </p>

        <div class="info">
            ❄️ Fria: abaixo de 15°C <br>
            🌤️ Agradável: 15°C até 30°C <br>
            🔥 Quente: acima de 30°C
        </div>

        <div id="mensagem"></div>

    </div>

    <div id="resultado" class="card resultado" style="display:none;">

        <h4>Resultados</h4>

        <div id="resumo" class="resumo-cards"></div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Temperatura</th>
                    <th>Classificação</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody id="tabela"></tbody>
        </table>

        <div class="botoes">
            <button id="limpar" class="btn-danger">Limpar Dados</button>
            <button id="voltar" class="btn-secondary">Voltar</button>
        </div>

    </div>

</div>

</body>
</html>
