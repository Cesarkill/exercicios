<?php
require_once("../conexao.php");

$sql = "select * from funcionario order by id";
$lista = mysqli_query($result, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPRESA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
        include("../menu.php");
    ?>
    <div class="container">
        <h1 align="center">FUNCIONARIOS</h1>
        <hr>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Cargo</th>
                <th>Salario</th>
                <th>Admissao</th>
                <th>Acoes</th>
            </tr>
            <?php
            while ($linha = mysqli_fetch_assoc($lista)) {
            ?>
                <tr>
                    <td><?php echo $linha['id']; ?></td>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo $linha['email']; ?></td>
                    <td><?php echo $linha['cargo']; ?></td>
                    <td><?php echo $linha['salario']; ?></td>
                    <td><?php echo $linha['data_admissao']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $linha['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="remover.php?id=<?php echo $linha['id']; ?>" class="btn btn-danger btn-sm">Remover</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>