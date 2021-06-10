<?php
$title = 'Accès non autorisé - Michael-dev';
ob_start()
?>

<section class="error">
    <div class="section-wrapper">
        <div class="error__body">
            <h1 class="error__error-code">403</h1>
            <h2 class="error__title">Vous ne passerez pas !</h2>
            <p class="error__message"><?= $templateVars['message'] ?></p>
            <a href="<?= $templateVars['router']->generateUrl('homepage') ?>" class="button square">Retour à l'accueil →</a>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
