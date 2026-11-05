<?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cargo = $_POST["cargo"];
    $salario = $_POST["salario"];
    $data_admissao = $_POST["data_admissao"];

    $SQL = "INSERT INTO funcionarios (nome, email, cargo, salario, data_admissao) 
            VALUES ('$nome', '$email', '$cargo', $salario, '$data_admissao')";

    require_once("../conexao.php");

    $resposta = mysqli_query($conexao, $SQL);

    if ($resposta == true) {
        header("Location: ../listar.php");
    }
?>