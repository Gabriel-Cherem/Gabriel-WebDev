<?php
/**
 * includes/timeline.php
 * Lista cronológica reutilizada por "Experiência" e "Formação".
 *
 * Cada item de $items aceita:
 *   periodo (obrigatório), titulo (obrigatório), subtitulo, local,
 *   duracao (texto calculado), atual (bool), detalhes (array de textos)
 *
 * @var array $items
 */
?>
<ol class="timeline">
    <?php foreach ($items as $item): ?>
        <li class="timeline__item">
            <div class="timeline__when">
                <span class="timeline__period"><?= e($item['periodo']) ?></span>
                <?php if (!empty($item['duracao'])): ?>
                    <span class="timeline__duration"><?= e($item['duracao']) ?></span>
                <?php endif; ?>
                <?php if (!empty($item['atual'])): ?>
                    <span class="timeline__current">Em andamento</span>
                <?php endif; ?>
            </div>

            <div class="timeline__body">
                <h3 class="timeline__title"><?= e($item['titulo']) ?></h3>

                <?php if (!empty($item['subtitulo'])): ?>
                    <p class="timeline__org"><?= e($item['subtitulo']) ?></p>
                <?php endif; ?>

                <?php if (!empty($item['local'])): ?>
                    <p class="timeline__place"><?= e($item['local']) ?></p>
                <?php endif; ?>

                <?php if (!empty($item['detalhes'])): ?>
                    <ul class="timeline__details">
                        <?php foreach ($item['detalhes'] as $detalhe): ?>
                            <li><?= e($detalhe) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </li>
    <?php endforeach; ?>
</ol>
