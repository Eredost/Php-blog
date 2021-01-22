<?php
$title = $templateVars['post']->getTitle();
ob_start();
?>

<div class="page">
    <section class="page-banner">
        <div class="section-wrapper">
            <div class="page-banner__head">
                <h1 class="page-banner__title">Blog</h1>
                <div class="page-banner__breadcrumb">
                    <a href="<?= $templateVars['router']->generate('homepage') ?>">Accueil</a>
                    > <a href="<?= $templateVars['router']->generate('articleList') ?>">Blog</a>
                    > <?= $templateVars['post']->getTitle() ?>
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="section-wrapper">

            <div class="blog__content">
                <div class="article-card">
                    <div class="article-card__image">
                        <time class="article-card__publication-date" datetime="<?= (new DateTime($templateVars['post']->getCreatedAt()))->format('Y-m-d') ?>">
                            <?=
                            preg_replace_callback('/\/(\d{1,2})/', function($matches) {
                                return '<span>' . numberToAbbrMonthName($matches[1]) . '</span>';
                            }, (new DateTime($templateVars['post']->getCreatedAt()))->format('d /n'))
                            ?>
                        </time>
                        <img src="<?= $templateVars['post']->getImage() ?>" alt="">
                    </div>

                    <div class="article-card__body">
                        <div class="article-card__icons">
                            <div>
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <?= $templateVars['post']->username ?>
                            </div>
                            <div>
                                <i class="fa fa-comment" aria-hidden="true"></i>
                                <?= (count($templateVars['comments']) > 0 ? count($templateVars['comments']) . ' commentaire(s)': 'Pas de commentaires') ?>
                            </div>
                            <div>
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                <?=
                                preg_replace_callback('/\/(\d{1,2})/', function($matches) {
                                    return '<span>' . numberToFullyMonthName($matches[1]) . '</span>';
                                }, (new DateTime($templateVars['post']->getUpdatedAt() ?? $templateVars['post']->getCreatedAt()))->format('d /n Y'))
                                ?>
                            </div>
                        </div>

                        <h2 class="article-card__title">
                            <?= $templateVars['post']->getTitle() ?>
                        </h2>

                        <p class="article-card__summary"><?= $templateVars['post']->getSummary() ?></p>

                        <p class="article-card__content">
                            <?= nl2br($templateVars['post']->getContent()) ?>
                        </p>
                    </div>
                </div>

                <div class="comments">
                    <div class="sidebar-title mt">
                        <?= (count($templateVars['comments']) > 0 ? count($templateVars['comments']) . ' commentaire(s)' : 'Pas de commentaires') ?>
                    </div>

                    <?php if (empty($templateVars['comments'])): ?>

                        <p>Soyez le premier à réagir à cette article !</p>
                    <?php endif; ?>

                    <div class="sidebar-title mt">Laisser un commentaire</div>

                    <?php if ($templateVars['request']->isAuthenticated()): ?>

                        <form class="form" action="<?= $templateVars['router']->generate('articleShow', ['postId' => $templateVars['post']->getId()]) . '#comm' ?>" method="post">
                            <?= $templateVars['commentForm']; ?>
                        </form>

                    <?php else: ?>

                        <p>Vous devez être connecté pour pouvoir laisser un commentaire.</p>
                    <?php endif; ?>
                </div>
            </div>

            <?php include __DIR__ . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . '_sidebar.tpl.php' ?>
        </div>
    </section>
</div>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
