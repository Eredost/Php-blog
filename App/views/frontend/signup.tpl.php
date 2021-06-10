<?php
$title = 'Inscription - Michael-dev';
ob_start();
?>

<section class="signup">
    <div class="section-wrapper">
        <div>
            <div class="signup__body">

                <h1 class="signup__title">
                    Inscription
                </h1>

                <form action="<?= $templateVars['router']->generateUrl('signup') ?>" method="post">

                    <?= $templateVars['signupForm'] ?>

                    <p class="signup__agree-terms">
                        En cliquant sur Accepter et s'inscrire, vous acceptez les
                        <a href="#">Conditions d'utilisation</a>
                        , la <a href="<?= $templateVars['router']->generateUrl('privacyPolicy') ?>">Politique de confidentialité</a>
                        et la <a href="#">Politique relative aux cookies</a> du site
                    </p>
                    <input class="button square full-width" type="submit" value="Accepter et s'inscrire">
                </form>
            </div>

            <div class="signup__footer">
                <p>
                    Vous avez déjà un compte ?
                    <a href="<?= $templateVars['router']->generateUrl('login') ?>">Connectez vous</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
