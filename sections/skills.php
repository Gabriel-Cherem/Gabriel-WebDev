<?php
/**
 * sections/skills.php
 * Dados: 'habilidades' em data/portfolio.php.
 * Para incluir uma tecnologia nova, adicione um item no grupo desejado.
 *
 * @var array $portfolio
 */
?>
<section class="section" id="habilidades" aria-labelledby="habilidades-titulo">
    <div class="wrap section__grid">
        <header class="section__head">
            <h2 class="section__title" id="habilidades-titulo">Habilidades</h2>
        </header>

        <div class="section__content">
            <?php foreach ($portfolio['habilidades'] as $grupo): ?>
                <div class="skill-group">
                    <h3 class="skill-group__name"><?= e($grupo['grupo']) ?></h3>

                    <ul class="skill-list">
                        <?php foreach ($grupo['itens'] as $skill): ?>
                            <li class="skill">
                                <i class="<?= e($skill['icone']) ?>" aria-hidden="true"></i>
                                <?= e($skill['nome']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
