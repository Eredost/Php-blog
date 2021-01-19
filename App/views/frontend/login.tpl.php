<?php ob_start(); ?>

<section class="login">
    <div class="section-wrapper">
        <div>
            <div class="login__body">

                <h1 class="login__title">Connexion</h1>
                
                <form action="<?= $templateVars['router']->generate('login') ?>" method="post">
                    <?= $templateVars['loginForm'] ?>
                    <input class="button square full-width" type="submit" value="Se connecter">
                </form>
            </div>

            <div class="login__footer">
                <p>
                    Vous n'êtes pas encore inscrit ?
                    <a href="<?= $templateVars['router']->generate('signup') ?>">Inscrivez vous</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
