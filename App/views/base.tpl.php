<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ($title ?? 'Michaël Coutin - Développeur d\'applications') ?></title>
    <meta name="description" content="Blog professionnel présentant mes compétences et réalisations ainsi qu'une section blog afin de retrouver tous les articles que j'ai publiés" />

    <!-- OpenGraph -->
    <meta property="og:url"         content="http://blog.michael-dev.fr" />
    <meta property="og:title"       content="Michaël Coutin - Développeur d'applications" />
    <meta property="og:description" content="Blog professionnel présentant mes compétences et réalisations ainsi qu'une section blog afin de retrouver tous les articles que j'ai publiés" />
    <meta property="og:image"       content="<?= $templateVars['request']->baseURI() ?>/uploads/profile-picture.png" />
    <meta property="og:type"        content="website" />
    <meta property="og:locale"      content="fr_FR" />

    <!-- Twitter cards -->
    <meta property="twitter:card"        content="summary">
    <meta property="twitter:description" content="Blog professionnel présentant mes compétences et réalisations ainsi qu'une section blog afin de retrouver tous les articles que j'ai publiés">
    <meta property="twitter:title"       content="Michaël Coutin - Développeur d'applications">
    <meta property="twitter:image"       content="<?= $templateVars['request']->baseURI() ?>/uploads/profile-picture.png">

    <link rel="stylesheet" href="<?= $templateVars['request']->baseURI() ?>/main.css" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= $templateVars['request']->baseURI() ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $templateVars['request']->baseURI() ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $templateVars['request']->baseURI() ?>/favicon-16x16.png">
    <link rel="manifest" href="<?= $templateVars['request']->baseURI() ?>/site.webmanifest">
</head>
<body class="body">

    <?php include('layouts/_header.tpl.php') ?>

    <?= $content ?? '' ?>

    <?php include('layouts/_footer.tpl.php') ?>

    <script src="<?= $templateVars['request']->baseURI() ?>/js/main.js" defer></script>
</body>
</html>
