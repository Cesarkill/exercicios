<?php
$servidor = "localhost:3307";
$usuario  = "root";
$senha    = "";
$bd       = "empresa";

$result = mysqli_connect($servidor, $usuario, $senha, $bd);

if (!$result) {
    die("Erro ao conectar: " . mysqli_connect_error());
}

// echo "Conexao realizada com sucesso";
?>