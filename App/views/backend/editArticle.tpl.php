<?php
$title = $templateVars['postName'] . ' - Michael-dev';
ob_start()
?>

    <section>
        <div class="section-wrapper">
            <div class="admin-modal">

                <h1 class="admin-modal__title">Modification d'un article</h1>

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
