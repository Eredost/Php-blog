<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ($title ?? 'Michaël Coutin - Développeur d\'applications') ?></title>

    <link rel="stylesheet" href="<?= $templateVars['request']->baseURI() ?>/main.css" type="text/css">
    <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
    <link rel="manifest" href="./site.webmanifest">
</head>
<body class="body">

    <?php include('layouts/_header.tpl.php') ?>

    <?= $content ?? '' ?>

    <?php include('layouts/_footer.tpl.php') ?>

    <script src="<?= $templateVars['request']->baseURI() ?>/js/main.js" defer></script>
</body>
</html>
