<?php
/**
 * index.php
 * Ponto de entrada do site. Carrega os dados, monta o layout e imprime
 * cada seção na ordem definida em $sections.
 *
 * PARA ADICIONAR UMA NOVA SEÇÃO:
 *  1. Crie sections/minha-secao.php
 *  2. Inclua o nome do arquivo (sem .php) em $sections, na posição desejada
 *  3. Adicione o link correspondente em 'menu' no arquivo data/portfolio.php
 */

declare(strict_types=1);

require __DIR__ . '/includes/helpers.php';

date_default_timezone_set('America/Sao_Paulo');

/** @var array $portfolio Todos os dados do site (veja data/portfolio.php). */
$portfolio = require __DIR__ . '/data/portfolio.php';

/** Ordem em que as seções aparecem na página. */
$sections = [
    'hero',
    'about',
    'skills',
    'experience',
    'education',
    'projects',
    'certifications',
    'contact',
];

partial('includes/head', ['portfolio' => $portfolio]);
partial('includes/navbar', ['portfolio' => $portfolio]);
?>

<main id="conteudo">
<?php foreach ($sections as $section): ?>
    <?php partial("sections/{$section}", ['portfolio' => $portfolio]); ?>
<?php endforeach; ?>
</main>

<?php partial('includes/footer', ['portfolio' => $portfolio]); ?>
