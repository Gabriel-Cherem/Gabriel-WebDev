<?php
/**
 * ============================================================================
 *  data/portfolio.php  —  ÚNICA FONTE DE DADOS DO SITE
 * ============================================================================
 *  Para atualizar o site você só precisa editar ESTE arquivo.
 *  Nenhum HTML precisa ser tocado: as seções em /sections leem estes arrays
 *  e geram a página com foreach.
 *
 *  COMO ATUALIZAR (resumo)
 *  - Novo projeto ............ adicione um bloco em 'projetos' (veja o modelo lá)
 *  - Nova habilidade ......... adicione um item em um grupo de 'habilidades'
 *  - Nova experiência ........ adicione um bloco em 'experiencias'
 *  - Novo curso/evento ....... adicione um bloco em 'certificacoes'
 *  - Trocar links sociais .... edite 'redes'
 * ============================================================================
 */

declare(strict_types=1);

return [

    // -------------------------------------------------------------------------
    // CONFIGURAÇÕES GERAIS (aparecem no <head> da página)
    // -------------------------------------------------------------------------
    'site' => [
        'lang'      => 'pt-BR',
        'titulo'    => 'Gabriel Jeremias Cherem | Desenvolvedor Back-end Java',
        'descricao' => 'Portfólio de Gabriel Jeremias Cherem, desenvolvedor back-end com Java, Spring Boot e .NET Core. Projetos, experiência e formação.',
        'cor_tema'  => '#0a1620',
    ],

    // -------------------------------------------------------------------------
    // DADOS PESSOAIS
    // -------------------------------------------------------------------------
    'pessoa' => [
        'nome'         => 'Gabriel Jeremias Cherem',
        'nome_curto'   => 'Gabriel Cherem', // usado na barra de navegação e no rodapé
        'titulo'       => 'Software Developer | Java Springboot | .NET Core | Linux, MongoDB & more',
        'localizacao'  => 'São José, Santa Catarina, Brasil',
    ],

    // -------------------------------------------------------------------------
    // REDES / LINKS (usados no hero, no contato e no rodapé)
    // 'icone' usa a biblioteca Bootstrap Icons: https://icons.getbootstrap.com
    // -------------------------------------------------------------------------
    'redes' => [
        [
            'rotulo' => 'LinkedIn',
            'url'    => 'https://www.linkedin.com/in/gabriel-jeremias-cherem-66528727a/',
            'icone'  => 'bi bi-linkedin',
        ],
        [
            'rotulo' => 'GitHub',
            // TODO: troque SEU-USUARIO pelo seu usuário do GitHub.
            'url'    => 'https://github.com/Gabriel-Cherem',
            'icone'  => 'bi bi-github',
        ],
    ],

    // -------------------------------------------------------------------------
    // MENU DE NAVEGAÇÃO
    // 'id' precisa ser igual ao id="" da <section> correspondente.
    // -------------------------------------------------------------------------
    'menu' => [
        ['id' => 'sobre',          'rotulo' => 'Sobre'],
        ['id' => 'habilidades',    'rotulo' => 'Habilidades'],
        ['id' => 'experiencia',    'rotulo' => 'Experiência'],
        ['id' => 'formacao',       'rotulo' => 'Formação'],
        ['id' => 'projetos',       'rotulo' => 'Projetos'],
        ['id' => 'certificacoes',  'rotulo' => 'Certificações'],
        ['id' => 'contato',        'rotulo' => 'Contato'],
    ],

    // -------------------------------------------------------------------------
    // HERO (primeira dobra)
    // 'api' alimenta o cartão que imita a resposta de uma API REST.
    // O conteúdo de 'resposta' vira o JSON exibido na tela.
    // 'estilo' dos botões: 'primary' (preenchido) ou 'ghost' (contorno).
    // -------------------------------------------------------------------------
    'hero' => [
        'acoes' => [
            ['rotulo' => 'Ver projetos', 'alvo' => '#projetos', 'estilo' => 'primary'],
            ['rotulo' => 'Falar comigo', 'alvo' => '#contato',  'estilo' => 'ghost'],
        ],
        'api' => [
            'metodo' => 'GET',
            'rota'   => '/api/gabriel',
            'status' => '200 OK',
            'resposta' => [
                'nome'    => 'Gabriel Jeremias Cherem',
                'cargo'   => 'Desenvolvedor Aprendiz',
                'empresa' => 'Softplan',
                'local'   => 'São José, SC',
                'stack'   => ['Java', 'Spring Boot', '.NET Core', 'MySQL', 'MongoDB'],
                'foco'    => 'APIs de integração e documentação técnica',
            ],
        ],
    ],

    // -------------------------------------------------------------------------
    // SOBRE MIM
    // 'resumo' é uma lista de parágrafos: cada item vira um <p>.
    // -------------------------------------------------------------------------
    'sobre' => [
        'resumo' => [
            'Desenvolvedor Aprendiz na Softplan, com foco em desenvolvimento back-end e construção de aplicações robustas e escaláveis. Atuo com Java e o ecossistema Spring Boot para criação de APIs e serviços, utilizando boas práticas de arquitetura REST e gerenciamento de dados com MySQL.',
            'Tenho também experiência em C++. Atualmente, meu foco principal está no desenvolvimento de APIs de integração e na documentação técnica de sistemas (Swagger/SpringDoc).',
        ],
        'filosofia' => 'Comprometido em evoluir, criar soluções de valor real e manter o código limpo, organizado e bem documentado.',
        'fatos' => [
            ['rotulo' => 'Atualmente',  'valor' => 'Softplan, Florianópolis'],
            ['rotulo' => 'Estudando',   'valor' => 'Ciência da Computação, Univali'],
            ['rotulo' => 'Baseado em',  'valor' => 'São José, SC'],
        ],
    ],

    // -------------------------------------------------------------------------
    // HABILIDADES
    // Cada grupo tem 'grupo' (título) e 'itens'.
    // 'icone' aceita:
    //   - Devicon (tecnologias):  https://devicon.dev  ex.: 'devicon-java-plain'
    //   - Bootstrap Icons:        https://icons.getbootstrap.com  ex.: 'bi bi-diagram-3'
    // Se o ícone não existir, o nome da tecnologia continua aparecendo.
    // -------------------------------------------------------------------------
    'habilidades' => [
        [
            'grupo' => 'Linguagens',
            'itens' => [
                ['nome' => 'Java',       'icone' => 'devicon-java-plain'],
                ['nome' => 'Python',     'icone' => 'devicon-python-plain'],
                ['nome' => 'C++',        'icone' => 'devicon-cplusplus-plain'],
                ['nome' => 'JavaScript', 'icone' => 'devicon-javascript-plain'],
            ],
        ],
        [
            'grupo' => 'Frameworks',
            'itens' => [
                ['nome' => 'Spring Boot', 'icone' => 'devicon-spring-plain'],
                ['nome' => 'Django',      'icone' => 'devicon-django-plain'],
                ['nome' => 'Bootstrap',   'icone' => 'devicon-bootstrap-plain'],
                ['nome' => '.NET Core',   'icone' => 'devicon-dotnetcore-plain'],
            ],
        ],
        [
            'grupo' => 'Tecnologias e ferramentas',
            'itens' => [
                ['nome' => 'API REST',            'icone' => 'bi bi-diagram-3'],
                ['nome' => 'MySQL',               'icone' => 'devicon-mysql-plain'],
                ['nome' => 'MongoDB',             'icone' => 'devicon-mongodb-plain'],
                ['nome' => 'Postman',             'icone' => 'devicon-postman-plain'],
                ['nome' => 'Docker',              'icone' => 'devicon-docker-plain'],
                ['nome' => 'SpringDoc (Swagger)', 'icone' => 'devicon-swagger-plain'],
                ['nome' => 'Linux',               'icone' => 'devicon-linux-plain'],
                ['nome' => 'Git',                 'icone' => 'devicon-git-plain'],
            ],
        ],
    ],

    // -------------------------------------------------------------------------
    // EXPERIÊNCIA PROFISSIONAL
    // Campos:
    //   periodo   texto exibido na tela
    //   inicio    data real (AAAA-MM-DD). Com 'fim' => null o site calcula
    //             sozinho "há quanto tempo" você está no cargo.
    //   fim       AAAA-MM-DD ou null (cargo atual)
    //   atual     true mostra o marcador verde "em andamento"
    //   detalhes  lista de atividades (opcional)
    // Para adicionar outra experiência, copie um bloco inteiro e cole abaixo
    // (as mais recentes primeiro).
    // -------------------------------------------------------------------------
    'experiencias' => [
        [
            'periodo'    => 'Nov. de 2025 – o momento',
            'inicio'     => '2025-11-01',
            'fim'        => null,
            'atual'      => true,
            'titulo'     => 'Jovem Aprendiz (Desenvolvedor)',
            'subtitulo'  => 'Softplan',
            'local'      => 'Florianópolis, SC (híbrido)',
            'detalhes'   => [
                'Desenvolvimento de APIs de integração com Java e Spring Boot',
                'Documentação técnica de sistemas com Swagger/SpringDoc',
                'Gerenciamento de dados com MySQL e arquitetura REST',
            ],
        ],
    ],

    // -------------------------------------------------------------------------
    // FORMAÇÃO ACADÊMICA (mesma estrutura das experiências)
    // -------------------------------------------------------------------------
    'formacao' => [
        [
            'periodo'    => 'Fev 2026 – Dez 2030',
            'titulo'     => 'Bacharelado em Ciência da Computação',
            'subtitulo'  => 'Universidade do Vale do Itajaí (Univali)',
        ],
        [
            'periodo'    => 'Set 2021 – Dez 2025',
            'titulo'     => 'Ensino Médio Técnico em Telecomunicações',
            'subtitulo'  => 'Instituto Federal de Santa Catarina (IFSC)',
        ],
    ],

    // -------------------------------------------------------------------------
    // PROJETOS
    // -------------------------------------------------------------------------
    // PARA ADICIONAR UM PROJETO NOVO, copie o modelo abaixo, cole no final da
    // lista e preencha. Campos opcionais podem ser removidos.
    //
    //  [
    //      'titulo'        => 'Nome do projeto',
    //      'periodo'       => 'Jan 2026 – Mar 2026',
    //      'contexto'      => 'Onde/como foi feito (opcional)',
    //      'descricao'     => 'O que o projeto faz e qual problema resolve.',
    //      'contribuicoes' => ['Back-end', 'API REST'],   // opcional
    //      'link'          => 'https://github.com/usuario/repositorio',
    //      'link_rotulo'   => 'Ver no GitHub',
    //      'imagem'        => 'assets/img/projeto.png',   // opcional
    //  ],
    // -------------------------------------------------------------------------
    'projetos' => [
        [
            'titulo'        => 'Escape-Run',
            'periodo'       => 'Fev 2025 – Dez 2025',
            'contexto'      => 'Ensino Médio no IFSC São José',
            'descricao'     => 'Projeto de escape-run automatizado desenvolvido durante o Ensino Médio no IFSC SJ.',
            'contribuicoes' => ['Código', 'Arte', 'Visual', 'Decisões de projeto'],
            'link'          => 'https://github.com/ifsc-sj-60808/escape-run',
            'link_rotulo'   => 'Ver repositório no GitHub',
            'imagem'        => null,
        ],

        [
          'titulo'        => 'Dashboard de paises',
          'periodo'       => 'Nov 2026 – Nov 2026',
          'contexto'      => 'Fizemos uma dashboard de países utilizando streamlit e pandas no python',
          'descricao'     => 'Dashboard interativa para visualização de dados de países.',
          'contribuicoes' => ['Back-end', 'Feature de moeda e conversão'],   // opcional
          'link'          => 'https://github.com/AJGamer10/country-dashboard',
          'link_rotulo'   => 'Ver no GitHub',
          // 'imagem'        => 'assets/img/projeto.png',   // opcional
      ],

    ],

    // -------------------------------------------------------------------------
    // CERTIFICAÇÕES E EVENTOS
    // 'tipo' define a cor da borda: 'evento' (azul), 'certificacao' (verde)
    // ou 'curso' (neutro). 'rotulo_tipo' é o texto mostrado ao visitante.
    // 'data' e 'detalhe' são opcionais.
    // -------------------------------------------------------------------------
    'certificacoes' => [
        [
            'tipo'        => 'evento',
            'rotulo_tipo' => 'Evento',
            'titulo'      => 'Empreende Brazil',
            'detalhe'     => 'Voluntário e participante',
            'data'        => 'Maio 2026',
        ],
        [
            'tipo'        => 'evento',
            'rotulo_tipo' => 'Evento',
            'titulo'      => 'ProudTech Summit 2026',
            'detalhe'     => 'Participante, com insights sobre IA e inovação',
            'data'        => '',
        ],
        [
            'tipo'        => 'certificacao',
            'rotulo_tipo' => 'Certificação',
            'titulo'      => 'BLUEPEX ESSENTIALS',
            'detalhe'     => 'Certificação em Redes',
            'data'        => 'Maio 2026',
        ],
        [
            'tipo'        => 'curso',
            'rotulo_tipo' => 'Curso',
            'titulo'      => 'Inglês online (extracurricular)',
            'detalhe'     => 'UFSC',
            'data'        => '',
        ],
    ],

    // -------------------------------------------------------------------------
    // CONTATO
    // 'aviso_envio' é a mensagem mostrada depois que o formulário é validado.
    // Enquanto o envio real não estiver conectado (veja assets/js/main.js,
    // bloco "Formulário de contato"), ela orienta o visitante a usar o LinkedIn.
    // -------------------------------------------------------------------------
    'contato' => [
        'intro'       => 'Quer conversar sobre uma vaga, um projeto ou uma ideia? Envie uma mensagem ou me chame no LinkedIn.',
        'botao'       => 'Enviar mensagem',
        'aviso_envio' => 'O envio por este formulário ainda não está ativo. Fale comigo pelo LinkedIn.',
    ],
];
