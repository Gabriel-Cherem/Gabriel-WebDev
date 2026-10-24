<?php
/**
 * sections/certifications.php
 * Dados: 'certificacoes' em data/portfolio.php.
 *
 * @var array $portfolio
 */
?>
<section class="section" id="certificacoes" aria-labelledby="certificacoes-titulo">
    <div class="wrap section__grid">
        <header class="section__head">
            <h2 class="section__title" id="certificacoes-titulo">Certificações e eventos</h2>
        </header>

        <div class="section__content">
            <ul class="cert-list">
                <?php foreach ($portfolio['certificacoes'] as $cert): ?>
                    <li class="cert cert--<?= e($cert['tipo']) ?>">
                        <p class="cert__type"><?= e($cert['rotulo_tipo']) ?></p>
                        <h3 class="cert__title"><?= e($cert['titulo']) ?></h3>

                        <?php if (!empty($cert['detalhe'])): ?>
                            <p class="cert__detail"><?= e($cert['detalhe']) ?></p>
                        <?php endif; ?>

                        <?php if (!empty($cert['data'])): ?>
                            <p class="cert__date"><?= e($cert['data']) ?></p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
