<?php
/**
 * sections/projects.php
 * Dados: 'projetos' em data/portfolio.php.
 *
 * >>> PARA ADICIONAR UM PROJETO: não mexa neste arquivo. <<<
 * Abra data/portfolio.php, vá até 'projetos' e copie o modelo comentado lá.
 * Cada novo item vira um cartão automaticamente.
 *
 * @var array $portfolio
 */
$githubUrl = null;
foreach ($portfolio['redes'] as $rede) {
    if ($rede['rotulo'] === 'GitHub') {
        $githubUrl = $rede['url'];
    }
}
?>
<section class="section" id="projetos" aria-labelledby="projetos-titulo">
    <div class="wrap section__grid">
        <header class="section__head">
            <h2 class="section__title" id="projetos-titulo">Projetos</h2>
        </header>

        <div class="section__content">
            <ul class="projects">
                <?php foreach ($portfolio['projetos'] as $projeto): ?>
                    <li class="project">

                        <?php if (!empty($projeto['imagem'])): ?>
                            <img class="project__image" src="<?= e($projeto['imagem']) ?>"
                                 alt="Captura de tela do projeto <?= e($projeto['titulo']) ?>" loading="lazy">
                        <?php endif; ?>

                        <div class="project__header">
                            <h3 class="project__title"><?= e($projeto['titulo']) ?></h3>
                            <p class="project__meta">
                                <?= e($projeto['periodo']) ?>
                                <?php if (!empty($projeto['contexto'])): ?>
                                    <br><?= e($projeto['contexto']) ?>
                                <?php endif; ?>
                            </p>
                        </div>

                        <p class="project__desc"><?= e($projeto['descricao']) ?></p>

                        <?php if (!empty($projeto['contribuicoes'])): ?>
                            <div class="project__contrib">
                                <span class="project__contrib-label">Minha contribuição</span>
                                <ul class="chips">
                                    <?php foreach ($projeto['contribuicoes'] as $contribuicao): ?>
                                        <li class="chip"><?= e($contribuicao) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($projeto['link'])): ?>
                            <a class="btn btn--ghost project__link" href="<?= e($projeto['link']) ?>"
                               target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-github" aria-hidden="true"></i>
                                <?= e($projeto['link_rotulo'] ?? 'Ver projeto') ?>
                            </a>
                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>
            </ul>

            <?php if ($githubUrl !== null): ?>
                <p class="projects__more">
                    Outros trabalhos e estudos ficam no
                    <a href="<?= e($githubUrl) ?>" target="_blank" rel="noopener noreferrer">meu perfil do GitHub</a>.
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>
