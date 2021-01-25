<?php ob_start() ?>

    <section>
        <div class="section-wrapper">
            <div class="admin-modal">

                <h1 class="admin-modal__title">Modification d'un article</h1>

                <?php
                if ($flashMessages = $templateVars['request']->getFlashMessage(['success', 'error'])):
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

                <form enctype="multipart/form-data" action="<?= $templateVars['router']->generate('adminEditArticle', ['postId' => $templateVars['postId']]) ?>" method="post">
                    <?= $templateVars['editForm'] ?>

                    <div class="admin-modal__actions">
                        <input type="submit" class="button square" value="Modifier">

                        <a href="<?= $templateVars['router']->generate('adminShow') ?>">
                            Retour à l'administration
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </section>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';

