<?php
/**
 * includes/head.php
 * Abre o documento HTML (<html>, <head> e <body>).
 * O fechamento fica em includes/footer.php.
 *
 * @var array $portfolio
 */
$site = $portfolio['site'];

// Favicon embutido (monograma "G"): dispensa arquivo de imagem.
$favicon = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E"
         . "%3Crect width='32' height='32' rx='7' fill='%230a1620'/%3E"
         . "%3Ctext x='16' y='23' font-size='19' font-weight='700' text-anchor='middle' "
         . "fill='%2334e0a1' font-family='sans-serif'%3EG%3C/text%3E%3C/svg%3E";
?>
<!DOCTYPE html>
<html lang="<?= e($site['lang']) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= e($site['titulo']) ?></title>
    <meta name="description" content="<?= e($site['descricao']) ?>">
    <meta name="theme-color" content="<?= e($site['cor_tema']) ?>">

    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= e($site['titulo']) ?>">
    <meta property="og:description" content="<?= e($site['descricao']) ?>">

    <link rel="icon" href="<?= $favicon ?>">

    <!-- Fontes: Bricolage Grotesque (textos) e JetBrains Mono (apenas o cartão de código) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,300..800&amp;family=JetBrains+Mono:wght@400;500&amp;display=swap">

    <!-- Ícones: Devicon (tecnologias) e Bootstrap Icons (interface) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.16.0/devicon.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/main.js" defer></script>
</head>
<body>
    <a class="skip-link" href="#conteudo">Ir para o conteúdo</a>
