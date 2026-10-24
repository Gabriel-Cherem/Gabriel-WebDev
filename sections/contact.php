<?php
/**
 * sections/contact.php
 * Formulário (apenas layout + validação no navegador) e links sociais.
 * Dados: 'contato' e 'redes' em data/portfolio.php.
 *
 * Para ligar o envio de verdade, veja o bloco "Formulário de contato"
 * em assets/js/main.js.
 *
 * @var array $portfolio
 */
$contato = $portfolio['contato'];
?>
<section class="section" id="contato" aria-labelledby="contato-titulo">
    <div class="wrap section__grid">
        <header class="section__head">
            <h2 class="section__title" id="contato-titulo">Contato</h2>
        </header>

        <div class="section__content">
            <p class="contact__intro"><?= e($contato['intro']) ?></p>

            <div class="contact">
                <form class="contact__form" id="contact-form" novalidate
                      data-notice="<?= e($contato['aviso_envio']) ?>">

                    <div class="field" data-field>
                        <label for="contato-nome">Nome</label>
                        <input type="text" id="contato-nome" name="nome" autocomplete="name"
                               required aria-describedby="contato-nome-erro">
                        <p class="field__error" id="contato-nome-erro" data-error></p>
                    </div>

                    <div class="field" data-field>
                        <label for="contato-email">E-mail</label>
                        <input type="email" id="contato-email" name="email" autocomplete="email"
                               required aria-describedby="contato-email-erro">
                        <p class="field__error" id="contato-email-erro" data-error></p>
                    </div>

                    <div class="field" data-field>
                        <label for="contato-mensagem">Mensagem</label>
                        <textarea id="contato-mensagem" name="mensagem" rows="5" minlength="10"
                                  required aria-describedby="contato-mensagem-erro"></textarea>
                        <p class="field__error" id="contato-mensagem-erro" data-error></p>
                    </div>

                    <button class="btn btn--primary" type="submit"><?= e($contato['botao']) ?></button>

                    <p class="form-status" role="status" aria-live="polite" data-form-status></p>
                </form>

                <ul class="contact__links">
                    <?php foreach ($portfolio['redes'] as $rede): ?>
                        <li>
                            <a class="contact-link" href="<?= e($rede['url']) ?>" target="_blank" rel="noopener noreferrer">
                                <i class="<?= e($rede['icone']) ?>" aria-hidden="true"></i>
                                <?= e($rede['rotulo']) ?>
                                <span class="visually-hidden">(abre em nova aba)</span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
