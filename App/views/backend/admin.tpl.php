<?php
$title = 'Administration - Michael-dev';
ob_start();
?>

<div class="page">
    <section class="page-banner">
        <div class="section-wrapper">
            <div class="page-banner__head">
                <h1 class="page-banner__title">Administration</h1>
                <div class="page-banner__breadcrumb">
                    <a href="<?= $templateVars['router']->generate('homepage') ?>">Accueil</a>
                    > Administration
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-wrapper">

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

            <h2 class="sidebar-title big">Gestion des articles</h2>

            <p>
                <a href="<?= $templateVars['router']->generate('adminAddArticle') ?>" class="button square">+ Ajouter un article</a>
            </p>

            <div class="articles-admin">
                <?php foreach ($templateVars['posts'] as $post): ?>
                    <div class="article-admin">
                        <div class="article-admin__image">
                            <img src="<?= $post->getImage() ?>" alt="">
                        </div>
                        <div class="article-admin__title">
                            <?= $post->getTitle() ?>
                        </div>
                        <div class="article-admin__actions">
                            <a href="<?= $templateVars['router']->generate('adminEditArticle', ['postId' => $post->getId()]) ?>" class="article-admin__edit">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <form action="<?= $templateVars['router']->generate('adminDeleteArticle', ['postId' => $post->getId()]) ?>" method="post" class="article-admin__deletion" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer l\'article ?')">
                                <?= $templateVars['adminForm'] ?>
                                <button type="submit">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <h2 class="sidebar-title big">Gestion des commentaires</h2>

            <div class="comments">
                <?php foreach ($templateVars['comments'] as $comment): ?>
                    <div class="comment-admin">
                        <div class="comment-admin__content">
                            <?= htmlspecialchars($comment->getContent()) ?>
                        </div>
                        <div class="comment-admin__actions">
                            <form action="<?= $templateVars['router']->generate('adminValidateComment', ['commentId' => $comment->getId()]) ?>" method="post" class="comment-admin__validation">
                                <?= $templateVars['adminForm'] ?>
                                <button type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </button>
                            </form>
                            <form action="<?= $templateVars['router']->generate('adminDeleteComment', ['commentId' => $comment->getId()]) ?>" method="post" class="comment-admin__deletion" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer le commentaire ?')">
                                <?= $templateVars['adminForm'] ?>
                                <button type="submit">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
