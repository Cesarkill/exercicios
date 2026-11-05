<?php
require_once("../conexao.php");

$id = $_GET['id'];

$sql = "select * from funcionario where id = $id";
$lista = mysqli_query($result, $sql);
$funcionario = mysqli_fetch_assoc($lista);
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
        <h1 align="center">EDITAR FUNCIONARIO</h1>
        <hr>
        <form action="atualizar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $funcionario['id']; ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $funcionario['nome']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $funcionario['email']; ?>">
            </div>

            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo:</label>
                <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $funcionario['cargo']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="salario" class="form-label">Salario:</label>
                <input type="number" step="0.01" class="form-control" id="salario" name="salario" value="<?php echo $funcionario['salario']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="data_admissao" class="form-label">Admissao:</label>
                <input type="date" class="form-control" id="data_admissao" name="data_admissao" value="<?php echo $funcionario['data_admissao']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</body>
</html>