<?php
include "conexao.php";

date_default_timezone_set('America/Sao_Paulo');

$mensagem = "";
$resultadoFinal = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $temp = $_POST["temperature"] ?? "";

    if (!is_numeric($temp)) {
        $mensagem = "Digite um valor numérico válido!";
    } else {

        $temp = floatval($temp);

        if ($temp == 999) {
            $resultadoFinal = true;
        } else {

            if ($temp < -50 || $temp > 60) {
                $mensagem = "Temperatura inválida! Digite entre -50°C e 60°C.";
            } else {

                if ($temp < 15) {
                    $classification = "Fria";
                } elseif ($temp > 30) {
                    $classification = "Quente";
                } else {
                    $classification = "Agradável";
                }

                $temp_sql = mysqli_real_escape_string($conexao, $temp);
                $class_sql = mysqli_real_escape_string($conexao, $classification);

                $sql = "INSERT INTO exercicio13 (temperature, classification)
                        VALUES ('$temp_sql', '$class_sql')";

                mysqli_query($conexao, $sql);

                header("Location: index.php");
                exit;
            }
        }
    }
}

//limpar dados para novo teste

if (isset($_GET["limpar"])) {
    mysqli_query($conexao, "TRUNCATE TABLE exercicio13");
    header("Location: index.php");
    exit;
}
?>