<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $stylesheets ?? '' ?>
    <title><?= $title ?? 'Michaël Coutin - Développeur d\'applications' ?></title>
</head>
<body>

    <div>
        <?php include('layouts/_header.tpl.php') ?>

        <div>
            <?= $content ?? '' ?>
        </div>

        <?php include('layouts/_footer.tpl.php') ?>
    </div>

    <?= $javascript ?? '' ?>
</body>
</html>