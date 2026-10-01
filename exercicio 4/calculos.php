<?php
    $erro = null;

    if (!isset($_POST['nome']) || !isset($_POST['total'])) {
        $erro = "Dados incompletos. Por favor, preencha o formulário novamente.";
    } elseif (!isset($_POST['idade'])) {
        $erro = "Por favor, selecione uma faixa etária para continuar.";
    } elseif (!isset($_POST['parcelas']) || (int)$_POST['parcelas'] < 1) {
        $erro = "Por favor, informe uma quantidade válida de parcelas (no mínimo 1).";
    } else {
        $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
        $total = (float) str_replace(',', '.', $_POST['total']);
        $idade = (int) $_POST['idade'];
        $cartao = isset($_POST['cartao']) ? "Sim" : "Não";
        $parcelas = (int) $_POST['parcelas'];

        $desconto = 0;
        if ($idade == 1) {
            $desconto = $total * 0.05;
        } elseif ($idade == 2) {
            $desconto = $total * 0.07;
        }

        if ($cartao == "Sim") {
            $desconto += $total * 0.05;
        }

        $totalComDesconto = $total - $desconto;

    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Pedido - Farmácia Paracetaloka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <div class="card">
            <?php if ($erro): ?>
                <header class="card-header">
                    <span class="card-badge" style="background-color: #fee2e2; color: #991b1b;">Atenção</span>
                    <h1 class="card-title">Ops, algo faltou!</h1>
                    <p class="card-subtitle">Verifique os dados informados</p>
                </header>

                <div class="alert-box">
                    <?= $erro ?>
                </div>

                <a href="index.html" class="btn btn-secondary">Voltar ao Formulário</a>
            <?php else: ?>
                <header class="card-header">
                    <span class="card-badge">Resumo</span>
                    <h1 class="card-title">Resultado do Cálculo</h1>
                    <p class="card-subtitle">Confira os detalhes e descontos do pedido</p>
                </header>

                <ul class="result-list">
                    <li class="result-item">
                        <span class="label">Nome do Cliente</span>
                        <span class="value"><?= $nome ?></span>
                    </li>
                    <li class="result-item">
                        <span class="label">Total Original</span>
                        <span class="value">R$ <?= number_format($total, 2, ',', '.') ?></span>
                    </li>
                    <li class="result-item">
                        <span class="label">Cartão Fidelidade</span>
                        <span class="value"><?= $cartao ?></span>
                    </li>
                    <li class="result-item highlight-discount">
                        <span class="label">Desconto Aplicado</span>
                        <span class="value">- R$ <?= number_format($desconto, 2, ',', '.') ?></span>
                    </li>
                    <li class="result-item">
                        <span class="label">Parcelamento Escolhido</span>
                        <span class="value"><?= $parcelas ?>x de R$ <?= number_format($totalComDesconto / $parcelas, 2, ',', '.') ?></span>
                    </li>
                    <li class="result-item highlight-total">
                        <span class="label">Total a Pagar</span>
                        <span class="value">R$ <?= number_format($totalComDesconto, 2, ',', '.') ?></span>
                    </li>
                </ul>

                <div class="installments-section">
                    <h2 class="installments-title">Opções de Parcelamento</h2>
                    <p class="installments-subtitle">Simulação de 1x a <?= $parcelas ?>x sobre o total com desconto</p>

                    <div class="installments-grid">
                        <div class="installment-box">
                            <div class="installment-box-header">
                                <span class="badge-loop badge-for">Versão com FOR</span>
                            </div>
                            <ul class="installment-items">
                                <?php for ($i = 1; $i <= $parcelas; $i++): ?>
                                    <?php $valorParcela = $totalComDesconto / $i; ?>
                                    <li class="installment-row <?= ($i === $parcelas) ? 'selected-installment' : '' ?>">
                                        <span class="installment-qty"><?= $i ?>x de</span>
                                        <span class="installment-val">R$ <?= number_format($valorParcela, 2, ',', '.') ?></span>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </div>

                        <div class="installment-box">
                            <div class="installment-box-header">
                                <span class="badge-loop badge-while">Versão com WHILE</span>
                            </div>
                            <ul class="installment-items">
                                <?php
                                    $j = 1;
                                    while ($j <= $parcelas):
                                        $valorParcela = $totalComDesconto / $j;
                                ?>
                                    <li class="installment-row <?= ($j === $parcelas) ? 'selected-installment' : '' ?>">
                                        <span class="installment-qty"><?= $j ?>x de</span>
                                        <span class="installment-val">R$ <?= number_format($valorParcela, 2, ',', '.') ?></span>
                                    </li>
                                <?php
                                        $j++;
                                    endwhile;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <a href="index.html" class="btn btn-secondary">Voltar ao Início</a>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>