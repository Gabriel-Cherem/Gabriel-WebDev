# Portfólio de Gabriel Jeremias Cherem

Site em PHP puro (sem framework, sem banco de dados). Todo o conteúdo fica em um único arquivo de dados e é desenhado na página com `foreach`.

## Requisitos

- PHP 8.0 ou superior
- Hospedagem com PHP (qualquer uma) ou o servidor embutido para testar localmente

## Como rodar localmente

```bash
cd portfolio
php -S localhost:8000
```

Abra http://localhost:8000 no navegador.

## Organização das pastas

```
portfolio/
├── index.php                  Ponto de entrada: carrega dados e monta a página
├── data/
│   └── portfolio.php          TODOS os dados do site (edite aqui)
├── includes/
│   ├── helpers.php            Funções: e(), partial(), format_duration(), json_preview_lines()
│   ├── head.php               <head>, fontes e ícones (abre <body>)
│   ├── navbar.php             Menu fixo no topo
│   ├── timeline.php           Lista cronológica (experiência e formação)
│   └── footer.php             Rodapé (fecha </body>)
├── sections/                  Uma seção da página por arquivo
│   ├── hero.php
│   ├── about.php
│   ├── skills.php
│   ├── experience.php
│   ├── education.php
│   ├── projects.php
│   ├── certifications.php
│   └── contact.php
└── assets/
    ├── css/style.css          Estilos (cores ficam em :root, no topo)
    └── js/main.js             Menu mobile, link ativo, animação do hero, formulário
```

## Como atualizar o conteúdo

Abra `data/portfolio.php`. Cada bloco tem comentários explicando os campos.

| Quero...                     | Onde editar                                      |
|------------------------------|--------------------------------------------------|
| Adicionar um projeto         | `'projetos'` (copie o modelo comentado)          |
| Adicionar uma tecnologia     | `'habilidades'`, dentro do grupo desejado        |
| Adicionar uma experiência    | `'experiencias'`                                 |
| Adicionar curso ou evento    | `'certificacoes'`                                |
| Trocar links do LinkedIn/GitHub | `'redes'`                                     |
| Mudar o JSON do hero         | `'hero'` → `'api'` → `'resposta'`                |

## Pendências antes de publicar

1. Troque `SEU-USUARIO` pelo seu usuário do GitHub em `'redes'` (arquivo `data/portfolio.php`).
2. O formulário de contato valida os campos, mas ainda não envia. Veja o comentário `TODO` em `assets/js/main.js` e atualize `'aviso_envio'` quando conectar o envio.

## Adicionar uma nova seção

1. Crie `sections/minha-secao.php` (use `sections/about.php` como modelo).
2. Adicione `'minha-secao'` à lista `$sections` em `index.php`.
3. Adicione o link em `'menu'` no `data/portfolio.php`.
