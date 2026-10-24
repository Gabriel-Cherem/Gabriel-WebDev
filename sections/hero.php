<?php
/**
 * sections/hero.php
 * Primeira dobra: nome, cargo, ações e o cartão que imita uma resposta de API.
 * Dados: 'pessoa', 'hero' e 'redes' em data/portfolio.php.
 *
 * @var array $portfolio
 */
$pessoa   = $portfolio['pessoa'];
$hero     = $portfolio['hero'];
$api      = $hero['api'];
$apiLines = json_preview_lines($api['resposta']);
?>
<section class="hero" id="inicio" aria-labelledby="hero-titulo">
    <div class="wrap hero__grid">

        <div class="hero__text">
            <p class="hero__place">
                <i class="bi bi-geo-alt" aria-hidden="true"></i>
                <?= e($pessoa['localizacao']) ?>
            </p>

            <h1 class="hero__name" id="hero-titulo"><?= e($pessoa['nome']) ?></h1>

            <p class="hero__title"><?= e($pessoa['titulo']) ?></p>

            <div class="hero__actions">
                <?php foreach ($hero['acoes'] as $acao): ?>
                    <a class="btn btn--<?= e($acao['estilo']) ?>" href="<?= e($acao['alvo']) ?>">
                        <?= e($acao['rotulo']) ?>
                    </a>
                <?php endforeach; ?>

                <ul class="social-list">
                    <?php foreach ($portfolio['redes'] as $rede): ?>
                        <li>
                            <a class="icon-link" href="<?= e($rede['url']) ?>" target="_blank" rel="noopener noreferrer"
                               aria-label="<?= e($rede['rotulo']) ?> (abre em nova aba)">
                                <i class="<?= e($rede['icone']) ?>" aria-hidden="true"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Cartão "resposta de API": o JSON é gerado a partir de hero.api.resposta -->
        <figure class="api-card" data-api-card aria-label="Exemplo de resposta de uma API com os dados de <?= e($pessoa['nome']) ?>">
            <div class="api-card__bar">
                <p class="api-request">
                    <span class="api-method"><?= e($api['metodo']) ?></span>
                    <span class="api-route"><?= e($api['rota']) ?></span>
                </p>
                <p class="api-status"><?= e($api['status']) ?></p>
            </div>
            <div class="api-card__body">
                <?php // $line já vem escapado por json_preview_lines(); não use e() aqui. ?>
                <pre class="api-code"><code><?php foreach ($apiLines as $line): ?><span class="api-line" data-api-line><?= $line ?></span><?php endforeach; ?></code></pre>
            </div>
        </figure>

    </div>
</section>
