<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exercício 3</title>
</head>

<body>
    <h4>Exercício III</h4>
    <form action="index.php" method="post">
        <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required>

        <label for="experiencia">Experiência (anos):</label>
        <input type="number" id="experiencia" name="experiencia" required>

        <input type="submit" value="Verificar">
    </form>

    <?php
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $idade = $_POST["idade"];
            $experiencia = $_POST["experiencia"];

            if ($idade >= 18 && $experiencia >= 2) 
            echo "$nome - VOCÊ FOI QUALIFICADO PARA A VAGA!";
        
            else 
            echo "$nome - VOCÊ NÃO FOI QUALIFICADO PARA A VAGA";
    }
    ?>

</body>
</html>
