<?php
date_default_timezone_set('America/Sao_Paulo'); 
include_once "conexao.php"; 

header('Content-Type: application/json');

$temp = $_POST["temperature"] ?? "";
$limpar = $_POST["limpar"] ?? false;

if($limpar){
    mysqli_query($conexao, "TRUNCATE TABLE exercicio13");
    echo json_encode(["limpo" => true]);
    exit;
}

if(!is_numeric($temp)){
    echo json_encode(["erro" => "Digite um valor numérico válido!"]);
    exit;
}

$temp = floatval($temp);

if($temp == 999){

    $total = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) as total FROM exercicio13"))["total"];

    if($total == 0) {
         echo json_encode(["final" => true, "total" => 0, "dados" => []]);
         exit;
    }

    $frias = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) as total FROM exercicio13 WHERE temperature < 15"))["total"];
    $agradaveis = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) as total FROM exercicio13 WHERE temperature BETWEEN 15 AND 30"))["total"];
    $quentes = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) as total FROM exercicio13 WHERE temperature > 30"))["total"];
    $media = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT AVG(temperature) as media FROM exercicio13"))["media"];
    $min = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT MIN(temperature) as min FROM exercicio13"))["min"];
    $max = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT MAX(temperature) as max FROM exercicio13"))["max"];

    $dados = [];
    $resultado = mysqli_query($conexao, "SELECT * FROM exercicio13 ORDER BY id ASC");

    while($row = mysqli_fetch_assoc($resultado)){
        $row['data_formatada'] = date('d/m/Y H:i:s', strtotime($row['registration_date']));
        $dados[] = $row;
    }

    echo json_encode([
        "final" => true,
        "total" => $total,
        "frias" => $frias,
        "agradaveis" => $agradaveis,
        "quentes" => $quentes,
        "media" => number_format($media, 1, ',', '.'),
        "min" => number_format($min, 1, ',', '.'),
        "max" => number_format($max, 1, ',', '.'),
        "dados" => $dados
    ]);

    exit;
}

if($temp < -50 || $temp > 60){
    echo json_encode(["erro" => "Temperatura inválida!"]);
    exit;
}

if($temp < 15) $class = "Fria";
elseif($temp > 30) $class = "Quente";
else $class = "Agradável";

$dataHora = date('Y-m-d H:i:s');

$sql = "INSERT INTO exercicio13 (temperature, classification, registration_date) 
        VALUES ('$temp', '$class', '$dataHora')";

if(mysqli_query($conexao, $sql)){
    echo json_encode(["sucesso" => true]);
} else {
    echo json_encode(["erro" => "Erro no banco: " . mysqli_error($conexao)]);
}
?>