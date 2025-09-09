<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exercício 7</title>
</head>
<body>
   <div class="container">
        <h3>Aluguel de Equipamentos Esportivos</h3>

        <form method="post">
            <label for="equipamento">Nome do equipamento:</label>
            <input type="text" name="equipamento" id="equipamento" required>

            <label>Tipo de cliente:</label>
            <input type="radio" name="tipo_cliente" value="VIP" required> VIP
            <input type="radio" name="tipo_cliente" value="Comum" required> Comum

            <button type="submit" name="gerar">Gerar Recibo</button>
        </form>

<?php
    
    if (isset($_POST['gerar'])) {
        $equipamento = $_POST['equipamento'];
        $tipo_cliente = $_POST['tipo_cliente'];
        $dias = 0;

        switch ($tipo_cliente) {
            case "VIP":
                $dias = 7;
                break;
            case "Comum":
                $dias = 2;
                break;
        }

        echo "<h3>Recibo de Aluguel</h3>";
        echo "<p><strong>Equipamento:</strong> $equipamento</p>";
        echo "<p><strong>Cliente:</strong> $tipo_cliente</p>";
        echo "<p><strong>Prazo para devolução:</strong> $dias dias</p>";
    }
?>

</body>
</html>