<?php
/**
 * sections/experience.php
 * Dados: 'experiencias' em data/portfolio.php.
 * Quando o item tem 'inicio', o tempo no cargo é calculado automaticamente.
 *
 * @var array $portfolio
 */
$experiencias = array_map(
    static function (array $exp): array {
        if (!empty($exp['inicio'])) {
            $exp['duracao'] = format_duration($exp['inicio'], $exp['fim'] ?? null);
        }
        return $exp;
    },
    $portfolio['experiencias']
);
?>
<section class="section" id="experiencia" aria-labelledby="experiencia-titulo">
    <div class="wrap section__grid">
        <header class="section__head">
            <h2 class="section__title" id="experiencia-titulo">Experiência profissional</h2>
        </header>

        <div class="section__content">
            <?php partial('includes/timeline', ['items' => $experiencias]); ?>
        </div>
    </div>
</section>
