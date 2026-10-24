<?php
/**
 * includes/navbar.php
 * Barra de navegação fixa no topo (sticky). Os links vêm de 'menu'
 * em data/portfolio.php. A rolagem suave é feita pelo CSS (scroll-behavior)
 * e o link da seção visível é destacado pelo assets/js/main.js.
 *
 * @var array $portfolio
 */
?>
<header class="site-nav">
    <div class="wrap site-nav__inner">
        <a class="site-nav__brand" href="#inicio"><?= e($portfolio['pessoa']['nome_curto']) ?></a>

        <button class="site-nav__toggle" type="button"
                aria-expanded="false" aria-controls="menu-principal" aria-label="Abrir menu">
            <?php // SVG próprio (não depende da fonte de ícones): o menu mobile precisa funcionar sempre. ?>
            <svg class="site-nav__icon" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path class="site-nav__icon-open" d="M4 7h16M4 12h16M4 17h16"/>
                <path class="site-nav__icon-close" d="M6 6l12 12M18 6L6 18"/>
            </svg>
        </button>

        <nav aria-label="Principal">
            <ul class="site-nav__menu" id="menu-principal">
                <?php foreach ($portfolio['menu'] as $item): ?>
                    <li>
                        <a class="site-nav__link" href="#<?= e($item['id']) ?>"><?= e($item['rotulo']) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>
