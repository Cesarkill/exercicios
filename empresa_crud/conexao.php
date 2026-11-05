<?php


$servidor = "localhost";
$usuario = "root";
$senha = "";

$db = "empresa";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db);

if ($conexao) {
    echo "BANCO CONECTADO COM SUCESSO.";
}else {
    echo "FALHA AO CONECTAR COM O BANCO DE DADOS: " . mysqli_connect_error($conexao);
}

?>