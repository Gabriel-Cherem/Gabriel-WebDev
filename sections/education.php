<?php
/**
 * sections/education.php
 * Dados: 'formacao' em data/portfolio.php.
 *
 * @var array $portfolio
 */
?>
<section class="section" id="formacao" aria-labelledby="formacao-titulo">
    <div class="wrap section__grid">
        <header class="section__head">
            <h2 class="section__title" id="formacao-titulo">Formação acadêmica</h2>
        </header>

        <div class="section__content">
            <?php partial('includes/timeline', ['items' => $portfolio['formacao']]); ?>
        </div>
    </div>
</section>
