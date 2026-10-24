<?php
/**
 * includes/footer.php
 * Rodapé e fechamento do documento (</body> e </html>).
 *
 * @var array $portfolio
 */
?>
<footer class="site-footer">
    <div class="wrap site-footer__inner">
        <p>&copy; <?= date('Y') ?> <?= e($portfolio['pessoa']['nome']) ?></p>

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

        <a class="site-footer__top" href="#inicio">Voltar ao topo</a>
    </div>
</footer>
</body>
</html>
