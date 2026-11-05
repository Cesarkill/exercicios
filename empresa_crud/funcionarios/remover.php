<?php
require_once("../conexao.php");

$id = $_GET['id'];

$sql = "delete from funcionario where id = $id";

mysqli_query($result, $sql);

header("Location: listar.php");
?>