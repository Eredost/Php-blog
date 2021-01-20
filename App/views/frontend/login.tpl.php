<?php ob_start(); ?>

<section class="login">
    <div class="section-wrapper">
        <div>
            <div class="login__body">

                <h1 class="login__title">Connexion</h1>

                <?php
                if ($flashMessages = $templateVars['request']->getFlashMessage(['error'])):
                    foreach ($flashMessages as $key => $message):
                        ?>
                        <div class="alert <?= $key ?>">
                            <i class="fa fa-times alert__closer" aria-hidden="true"></i>
                            <p><?= $message ?></p>
                        </div>
                    <?php
                    endforeach;
                endif;
                ?>
                
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
