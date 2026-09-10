<?php
    // Verifica se os dados foram enviados por POST
    $dadosEnviados = ($_SERVER['REQUEST_METHOD'] === 'POST') && !empty($_POST['nome']) && isset($_POST['ano']);

    if ($dadosEnviados) {
        $nome = trim((string) $_POST['nome']);
        $ano = (int) $_POST['ano'];
        $anoAtual = (int) date('Y');

        // Calcula a idade e o tempo percorrido
        $idade = $anoAtual - $ano;
        $dias = $idade * 365.25;
        $horas = $dias * 24;
        $minutos = $horas * 60;

        // Médias e expectativas
        $batimentosmedia = 75;
        $respiracoesmedia = 20;
        $expectativadevida = 90;

        // Batimentos e respirações já realizados
        $batimentos = $minutos * $batimentosmedia;
        $respiracoes = $minutos * $respiracoesmedia;

        // Totais estimados para a vida inteira (90 anos)
        $minutosExpectativa = $expectativadevida * 365.25 * 24 * 60;
        $expectativadebatimentos = $minutosExpectativa * $batimentosmedia;
        $expectativaderespiracoes = $minutosExpectativa * $respiracoesmedia;

        // Expectativa restante
        $expectativadevidarestante = $expectativadevida - $idade;
        $batimentosrestantes = $expectativadebatimentos - $batimentos;
        $respiracoesrestantes = $expectativaderespiracoes - $respiracoes;

        $ultrapassouExpectativa = ($idade >= $expectativadevida);
        $horaextra = "Você ultrapassou a expectativa de vida!";

        // Formatações
        $nomeFormatado = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
        $diasFormatados = number_format($dias, 0, ',', '.');
        $horasFormatadas = number_format($horas, 0, ',', '.');
        $minutosFormatados = number_format($minutos, 0, ',', '.');
        $batimentosFormatados = number_format($batimentos, 0, ',', '.');
        $respiracoesFormatadas = number_format($respiracoes, 0, ',', '.');

        if (!$ultrapassouExpectativa) {
            $anosRestantesFormatados = number_format($expectativadevidarestante, 0, ',', '.');
            $batimentosRestantesFormatados = number_format($batimentosrestantes, 0, ',', '.');
            $respiracoesRestantesFormatadas = number_format($respiracoesrestantes, 0, ',', '.');
        } else {
            $expectativadevidarestante = $horaextra;
            $batimentosrestantes = $horaextra;
            $respiracoesrestantes = $horaextra;
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Tempo de Vida</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            color: #1e293b;
        }

        .card {
            background: #ffffff;
            width: 100%;
            max-width: 620px;
            padding: 2.25rem 2rem;
            border-radius: 16px;
            box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.08), 0 10px 15px -8px rgba(0, 0, 0, 0.04);
            border: 1px solid #e2e8f0;
            text-align: center;
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .badge-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 50%;
            margin-bottom: 0.85rem;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
        }

        .badge-icon svg {
            width: 30px;
            height: 30px;
        }

        .card h1 {
            font-size: 1.65rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.35rem;
        }

        .card .subtitle {
            font-size: 0.95rem;
            color: #64748b;
            margin-bottom: 1.75rem;
        }

        .card .subtitle strong {
            color: #1e293b;
            font-weight: 600;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-align: left;
            margin-top: 1.5rem;
            margin-bottom: 0.85rem;
            font-size: 0.95rem;
            font-weight: 700;
            color: #334155;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .section-header svg {
            width: 18px;
            height: 18px;
            color: #2563eb;
        }

        .stats-grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .stats-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.85rem;
            margin-bottom: 1rem;
        }

        .stats-grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .stat-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1rem 0.6rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
        }

        .stat-box:hover {
            transform: translateY(-2px);
            border-color: #cbd5e1;
            box-shadow: 0 6px 14px -3px rgba(0, 0, 0, 0.06);
        }

        .stat-box.highlight-heart {
            background: linear-gradient(135deg, #fff1f2 0%, #ffe4e6 100%);
            border-color: #fecdd3;
        }

        .stat-box.highlight-heart .stat-label {
            color: #e11d48;
        }

        .stat-box.highlight-heart .stat-value {
            color: #be123c;
        }

        .stat-box.highlight-breath {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border-color: #bbf7d0;
        }

        .stat-box.highlight-breath .stat-label {
            color: #16a34a;
        }

        .stat-box.highlight-breath .stat-value {
            color: #15803d;
        }

        .stat-box.highlight-future {
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
            border-color: #e9d5ff;
        }

        .stat-box.highlight-future .stat-label {
            color: #9333ea;
        }

        .stat-box.highlight-future .stat-value {
            color: #7e22ce;
        }

        .stat-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #64748b;
            margin-bottom: 0.35rem;
        }

        .stat-value {
            font-size: 1.45rem;
            font-weight: 800;
            color: #2563eb;
            line-height: 1.1;
            word-break: break-word;
        }

        .stat-unit {
            font-size: 0.8rem;
            font-weight: 500;
            color: #64748b;
            margin-top: 0.25rem;
        }

        .banner-overdue {
            background: linear-gradient(135deg, #fefce8 0%, #fef08a 100%);
            border: 1px solid #facc15;
            color: #854d0e;
            padding: 1.1rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.25rem;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 0.85rem;
            box-shadow: 0 4px 10px rgba(234, 179, 8, 0.15);
        }

        .banner-overdue svg {
            width: 28px;
            height: 28px;
            flex-shrink: 0;
            color: #ca8a04;
        }

        .banner-overdue-title {
            font-weight: 700;
            font-size: 0.98rem;
            margin-bottom: 0.2rem;
            color: #713f12;
        }

        .banner-overdue-desc {
            font-size: 0.85rem;
            line-height: 1.4;
        }

        .info-list {
            background-color: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 0.85rem 1.25rem;
            margin-top: 1.5rem;
            margin-bottom: 1.75rem;
            text-align: left;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.88rem;
            padding: 0.35rem 0;
        }

        .info-item:not(:last-child) {
            border-bottom: 1px dashed #e2e8f0;
        }

        .info-item .info-label {
            color: #64748b;
        }

        .info-item .info-val {
            color: #0f172a;
            font-weight: 600;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.8rem 1.25rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: #ffffff;
            background-color: #2563eb;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
            transition: background-color 0.2s, transform 0.1s, box-shadow 0.2s;
        }

        .btn-back:hover {
            background-color: #1d4ed8;
            box-shadow: 0 6px 12px -2px rgba(37, 99, 235, 0.3);
        }

        .btn-back:active {
            transform: scale(0.98);
        }

        .empty-state {
            padding: 1.5rem 0.5rem;
        }

        .empty-state h2 {
            font-size: 1.3rem;
            color: #0f172a;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            font-size: 0.92rem;
            color: #64748b;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 600px) {
            .stats-grid-4 {
                grid-template-columns: repeat(2, 1fr);
            }
            .stats-grid-3 {
                grid-template-columns: 1fr;
            }
            .stats-grid-2 {
                grid-template-columns: 1fr;
            }
            .card {
                padding: 1.75rem 1.25rem;
            }
        }
    </style>
</head>
<body>
    <main class="card">
        <?php if ($dadosEnviados): ?>
            <div class="badge-icon">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <h1>Tempo de Vida & Métricas</h1>
            <p class="subtitle">Análise detalhada para <strong><?= $nomeFormatado ?></strong></p>

            <div class="section-header">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Tempo Percorrido</span>
            </div>

            <div class="stats-grid-4">
                <div class="stat-box">
                    <span class="stat-label">Idade Atual</span>
                    <span class="stat-value"><?= $idade ?></span>
                    <span class="stat-unit"><?= $idade === 1 ? 'ano' : 'anos' ?></span>
                </div>
                
                <div class="stat-box">
                    <span class="stat-label">Dias</span>
                    <span class="stat-value"><?= $diasFormatados ?></span>
                    <span class="stat-unit">dias aprox.</span>
                </div>

                <div class="stat-box">
                    <span class="stat-label">Horas</span>
                    <span class="stat-value"><?= $horasFormatadas ?></span>
                    <span class="stat-unit">horas aprox.</span>
                </div>

                <div class="stat-box">
                    <span class="stat-label">Minutos</span>
                    <span class="stat-value"><?= $minutosFormatados ?></span>
                    <span class="stat-unit">min. aprox.</span>
                </div>
            </div>

            <div class="section-header">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <span>Sinais Vitais Já Realizados</span>
            </div>

            <div class="stats-grid-2">
                <div class="stat-box highlight-heart">
                    <span class="stat-label">Batimentos Cardíacos</span>
                    <span class="stat-value"><?= $batimentosFormatados ?></span>
                    <span class="stat-unit">batimentos (~75 bpm)</span>
                </div>

                <div class="stat-box highlight-breath">
                    <span class="stat-label">Respirações</span>
                    <span class="stat-value"><?= $respiracoesFormatadas ?></span>
                    <span class="stat-unit">respirações (~20 rpm)</span>
                </div>
            </div>

            <div class="section-header">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <span>Expectativa Restante (Base: 90 anos)</span>
            </div>

            <?php if ($ultrapassouExpectativa): ?>
                <div class="banner-overdue">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <div class="banner-overdue-title">Parabéns! <?= $horaextra ?></div>
                        <div class="banner-overdue-desc">Você já ultrapassou a marca média dos 90 anos de idade. Cada novo instante vivido é um presente extraordinário!</div>
                    </div>
                </div>
            <?php else: ?>
                <div class="stats-grid-3">
                    <div class="stat-box highlight-future">
                        <span class="stat-label">Anos Restantes</span>
                        <span class="stat-value"><?= $anosRestantesFormatados ?></span>
                        <span class="stat-unit">anos estimados</span>
                    </div>

                    <div class="stat-box highlight-future">
                        <span class="stat-label">Batimentos Restantes</span>
                        <span class="stat-value"><?= $batimentosRestantesFormatados ?></span>
                        <span class="stat-unit">pulsos previstos</span>
                    </div>

                    <div class="stat-box highlight-future">
                        <span class="stat-label">Respirações Restantes</span>
                        <span class="stat-value"><?= $respiracoesRestantesFormatadas ?></span>
                        <span class="stat-unit">ciclos previstos</span>
                    </div>
                </div>
            <?php endif; ?>

            <div class="info-list">
                <div class="info-item">
                    <span class="info-label">Nome</span>
                    <span class="info-val"><?= $nomeFormatado ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Ano de nascimento</span>
                    <span class="info-val"><?= $ano ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Ano base de cálculo</span>
                    <span class="info-val"><?= $anoAtual ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Expectativa adotada</span>
                    <span class="info-val"><?= $expectativadevida ?> anos</span>
                </div>
            </div>

            <a href="index.html" class="btn-back">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Fazer novo cálculo
            </a>

        <?php else: ?>
            <div class="empty-state">
                <div class="badge-icon" style="background: #fef2f2; color: #ef4444; box-shadow: 0 4px 10px rgba(239, 68, 68, 0.12);">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h2>Nenhum dado encontrado</h2>
                <p>Por favor, preencha o formulário inicial para calcular o tempo de vida.</p>
                <a href="index.html" class="btn-back">
                    Ir para o formulário
                </a>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>