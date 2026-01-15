    <?php
    include "conexao.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $numero = intval($_POST["numero"]);

        for ($i = 1; $i <= 10; $i++) {

            $multiplo = $numero * $i;

            $sql = "INSERT INTO exercicio11 (base_number, multiple, date_time)
                    VALUES ($numero, $multiplo, NOW())";

            $conexao->query($sql);
        }


    }

