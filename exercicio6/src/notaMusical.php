<?php

    function notaMusical($numero):string {
            $resultado = "";

            if (is_numeric($numero)) {
                $numero = (int)$numero;
                $nota = "";

                switch ($numero) {
                    case 1:
                        $nota = "Dó";
                        break;
                    case 2:
                        $nota = "Ré";
                        break;
                    case 3:
                        $nota = "Mi";
                        break;
                    case 4:
                        $nota = "Fá";
                        break;
                    case 5:
                        $nota = "Sol";
                        break;
                    case 6:
                        $nota = "Lá";
                        break;
                    case 7:
                        $nota = "Si";
                        break;
                    case 8:
                        $nota = "Dó#";
                        break;
                    case 9:
                        $nota = "Ré#";
                        break;
                    case 10:
                        $nota = "Fá#";
                        break;
                    default:
                        $nota = "Número inválido. Insira um número entre 1 e 10.";
                }
                
                if ($nota) {
                    $resultado .= "<p class='resultado'>A nota musical correspondente é: " . $nota . "</p>";
                } else {
                    $resultado.= "<p class='resultado'>" . $nota . "</p>";
                }
                
            } else {
                $resultado .= "<p class='resultado'>Por favor, insira um número válido.</p>";
            }
            return $resultado;
    }
    
?>