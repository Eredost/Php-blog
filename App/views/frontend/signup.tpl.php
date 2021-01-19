<?php ob_start(); ?>

<section>
    <div class="section-wrapper">
        <div class="signup">
            <div class="signup__body">

                <h1 class="signup__title">
                    Inscription
                </h1>

                <form action="<?= $templateVars['router']->generate('signup') ?>" method="post">

                </form>
            </div>

            <div class="signup__footer">

            </div>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
