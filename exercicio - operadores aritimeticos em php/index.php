<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resultado</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h1>Resultado das Operações</h1>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $valor1 = (float) $_POST["valor1"];
            $valor2 = (float) $_POST["valor2"];

            $soma = $valor1 + $valor2;

            $subtracao = $valor1 - $valor2;

            $multiplicacao = $valor1 * $valor2;

            $potencia = $valor1 ** $valor2;

            $concatenacao = (string) $valor1 . (string) $valor2;

            echo "<div class='resultado'>";
            echo "Soma: $valor1 + $valor2 = $soma";
            echo "</div>";

            echo "<div class='resultado'>";
            echo "Subtração: $valor1 - $valor2 = $subtracao";
            echo "</div>";

            echo "<div class='resultado'>";
            echo "Multiplicação: $valor1 * $valor2 = $multiplicacao";
            echo "</div>";

            if ($valor2 != 0) {

                $divisao = $valor1 / $valor2;

                echo "<div class='resultado'>";

                echo "Divisão: $valor1 / $valor2 = $divisao";

                echo "</div>";
            } else {

                echo "<div class='erro'>";

                echo "Divisão: não é possível dividir por zero.";

                echo "</div>";
            }

            if ($valor2 != 0) {

                $modulo = (int) $valor1 % (int) $valor2;

                echo "<div class='resultado'>";

                echo "Resto da divisão: $valor1 % $valor2 = $modulo";

                echo "</div>";
            } else {

                echo "<div class='erro'>";

                echo "Resto da divisão: não é possível calcular com divisor zero.";

                echo "</div>";
            }


            echo "<div class='resultado'>";

            echo "Potência: $valor1 ** $valor2 = $potencia";

            echo "</div>";


            echo "<div class='resultado'>";

            echo "Concatenação: $concatenacao";

            echo "</div>";
        }

        ?>

        <a href="index.html">
            ← Fazer outro cálculo
        </a>

    </div>

</body>

</html>