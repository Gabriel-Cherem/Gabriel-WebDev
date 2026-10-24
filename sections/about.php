<?php
/**
 * sections/about.php
 * Dados: 'sobre' em data/portfolio.php.
 *
 * @var array $portfolio
 */
$sobre = $portfolio['sobre'];
?>
<section class="section" id="sobre" aria-labelledby="sobre-titulo">
    <div class="wrap section__grid">
        <header class="section__head">
            <h2 class="section__title" id="sobre-titulo">Sobre mim</h2>
        </header>

        <div class="section__content">
            <div class="prose">
                <?php foreach ($sobre['resumo'] as $paragrafo): ?>
                    <p><?= e($paragrafo) ?></p>
                <?php endforeach; ?>
            </div>

            <p class="principle"><?= e($sobre['filosofia']) ?></p>

            <dl class="facts">
                <?php foreach ($sobre['fatos'] as $fato): ?>
                    <div>
                        <dt><?= e($fato['rotulo']) ?></dt>
                        <dd><?= e($fato['valor']) ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        </div>
    </div>
</section>
