/**
 * assets/js/main.js
 * Interações do site. Sem dependências.
 *
 * 1. Menu mobile
 * 2. Link ativo na navegação (acompanha a seção visível)
 * 3. Resposta da API no hero (linhas aparecem em sequência)
 * 4. Formulário de contato (validação no navegador)
 *
 * A rolagem suave dos links #âncora é feita no CSS (scroll-behavior).
 */
(() => {
    'use strict';

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;


    /* 1. Menu mobile ------------------------------------------------------ */
    const toggle = document.querySelector('.site-nav__toggle');
    const menu = document.getElementById('menu-principal');

    if (toggle && menu) {
        // O ícone (três linhas / X) troca sozinho pelo CSS via aria-expanded.
        const setMenu = (open) => {
            menu.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
            toggle.setAttribute('aria-label', open ? 'Fechar menu' : 'Abrir menu');
        };

        toggle.addEventListener('click', () => {
            setMenu(toggle.getAttribute('aria-expanded') !== 'true');
        });

        // Fecha ao escolher um link ou ao apertar Esc
        menu.addEventListener('click', (event) => {
            if (event.target.closest('a')) setMenu(false);
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') setMenu(false);
        });
    }


    /* 2. Link ativo na navegação ------------------------------------------ */
    const navLinks = [...document.querySelectorAll('.site-nav__link')];

    if (navLinks.length && 'IntersectionObserver' in window) {
        const linkById = new Map(navLinks.map((link) => [link.getAttribute('href').slice(1), link]));

        // O hero também é observado: ao voltar ao topo, nenhum link fica ativo.
        const sections = document.querySelectorAll('main > section[id]');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                navLinks.forEach((link) => link.removeAttribute('aria-current'));
                const active = linkById.get(entry.target.id);
                if (active) active.setAttribute('aria-current', 'true');
            });
        }, { rootMargin: '-45% 0px -50% 0px' }); // considera "ativa" a seção no meio da tela

        sections.forEach((section) => observer.observe(section));
    }


    /* 3. Resposta da API no hero ------------------------------------------ */
    const apiCard = document.querySelector('[data-api-card]');

    if (apiCard && !prefersReducedMotion) {
        const lines = [...apiCard.querySelectorAll('[data-api-line]')];

        // Sem JavaScript (ou com movimento reduzido) tudo já aparece de uma vez.
        apiCard.classList.add('is-loading');
        lines.forEach((line) => line.classList.add('is-pending'));

        let index = 0;
        const revealNext = () => {
            if (index < lines.length) {
                lines[index].classList.remove('is-pending');
                index += 1;
                window.setTimeout(revealNext, 70);
            } else {
                apiCard.classList.remove('is-loading'); // mostra o "200 OK"
            }
        };

        window.setTimeout(revealNext, 400);
    }


    /* 4. Formulário de contato -------------------------------------------- */
    const form = document.getElementById('contact-form');

    if (form) {
        const status = form.querySelector('[data-form-status]');

        // Devolve a mensagem de erro do campo, ou '' se estiver válido.
        const validate = (input) => {
            const value = input.value.trim();

            if (value === '') return 'Preencha este campo.';

            if (input.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                return 'Informe um e-mail válido, como nome@exemplo.com.';
            }
            if (input.name === 'mensagem' && value.length < 10) {
                return 'Escreva pelo menos 10 caracteres.';
            }
            return '';
        };

        form.addEventListener('submit', (event) => {
            event.preventDefault();

            let firstInvalid = null;

            form.querySelectorAll('[data-field]').forEach((field) => {
                const input = field.querySelector('input, textarea');
                const error = field.querySelector('[data-error]');
                const message = validate(input);

                error.textContent = message;
                input.setAttribute('aria-invalid', message ? 'true' : 'false');

                if (message && !firstInvalid) firstInvalid = input;
            });

            if (firstInvalid) {
                status.textContent = '';
                firstInvalid.focus();
                return;
            }

            /*
             * TODO (envio real): troque o aviso abaixo por uma chamada ao seu
             * back-end. Exemplo com fetch:
             *
             *   const response = await fetch('contact.php', {
             *       method: 'POST',
             *       body: new FormData(form),
             *   });
             *
             * Se usar um serviço pronto (Formspree, Getform, etc.), aponte o
             * fetch para a URL do serviço. Ao conectar o envio, atualize
             * 'aviso_envio' em data/portfolio.php para uma mensagem de sucesso.
             */
            status.textContent = form.dataset.notice || '';
        });

        // Limpa o erro assim que a pessoa corrige o campo
        form.addEventListener('input', (event) => {
            const input = event.target.closest('input, textarea');
            if (!input || input.getAttribute('aria-invalid') !== 'true') return;

            if (validate(input) === '') {
                input.setAttribute('aria-invalid', 'false');
                input.closest('[data-field]').querySelector('[data-error]').textContent = '';
            }
        });
    }
})();
