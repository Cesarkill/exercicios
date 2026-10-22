<?php
$horas = (int) $_POST['horas'];
$veiculo = (int) $_POST['veiculo'];
if (isset($_POST['lavagem']))
    {
        $lavagem = "sim";
    }
else
    {
        $lavagem = "não";
    }

if ($veiculo == 0)
    {
        $primeira = 10;
        $adicional = 6;
    }
else
    {
        $primeira = 6;
        $adicional = 3;
    }

$total = $primeira;
for($h = 2; $h <= $horas; $h++)
    {
        $total = $total + $adicional;
    }

if ($total > 50)
    {
        $total = 50;
    }

if ($lavagem == 'sim')
    {
        $total += 20;
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia</title>
    <link rel="stylesheet" href="style-easypark.css">
</head>
<body>
    <h1>Easy Park</h1>
    <hr>
    <h2><?php echo "Valor final: $total"?></h2>
    </body>
</html>