<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Funcionário</title>
</head>
<body>
    <?php include '../menu.php'; ?>
    <h1>Adicionar Funcionário</h1>
    <form action="inserir.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required><br><br>

        <label for="salario">Salário:</label>
        <input type="number" id="salario" name="salario" step="0.01" required><br><br>

        <label for="data_adimissao">Data de Admissão:</label>
        <input type="date" id="data_adimissao" name="data_adimissao" required><br><br>

        <input type="submit" value="Adicionar Funcionário">
        <input type="reset" value="Limpar Campos">
    </form>
</body>
</html>