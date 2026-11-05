<?php
require_once("../conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$salario = $_POST['salario'];
$data_admissao = $_POST['data_admissao'];

$sql = "insert into funcionario (nome, email, cargo, salario, data_admissao) values ('$nome', '$email', '$cargo', '$salario', '$data_admissao')";

mysqli_query($result, $sql);

header("Location: listar.php");
?>