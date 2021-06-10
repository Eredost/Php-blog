<?php
$title = 'Page introuvable - Michael-dev';
ob_start()
?>

<section class="error">
    <div class="section-wrapper">
        <div class="error__body">
            <h1 class="error__error-code">404</h1>
            <h2 class="error__title">Il semblerait que vous soyez perdu</h2>
            <p class="error__message"><?= $templateVars['message'] ?></p>
            <a href="<?= $templateVars['router']->generateUrl('homepage') ?>" class="button square">Retour à l'accueil →</a>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
