<?php
require_once("../conexao.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$salario = $_POST['salario'];
$data_admissao = $_POST['data_admissao'];

$sql = "update funcionario set nome = '$nome', email = '$email', cargo = '$cargo', salario = '$salario', data_admissao = '$data_admissao' where id = $id";

mysqli_query($result, $sql);

header("Location: listar.php");
?>