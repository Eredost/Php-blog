<?php
$title = 'Blog - Michael-dev';
ob_start();
?>

<div class="page">
    <section class="page-banner">
        <div class="section-wrapper">
            <div class="page-banner__head">
                <h1 class="page-banner__title">Blog</h1>
                <div class="page-banner__breadcrumb">
                    <a href="<?= $templateVars['router']->generateUrl('homepage') ?>">Accueil</a>
                    > Blog
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="section-wrapper">
            <div class="blog__content">

                <?php foreach($templateVars['posts'] as $post): ?>

                    <div class="article-card">
                        <a class="article-card__image" href="<?= $templateVars['router']->generateUrl('articleShow', ['postId' => $post->getId()]) ?>">
                            <time class="article-card__publication-date" datetime="<?= (new DateTime($post->getCreatedAt()))->format('Y-m-d') ?>">
                                <?= (new DateTime($post->getCreatedAt()))->format('d') ?>
                                <span><?= $post->getMonthName('createdAt', true) ?></span>
                            </time>
                            <img src="<?= $templateVars['request']->baseURI() . $post->getImage() ?>" alt="">
                        </a>

                        <div class="article-card__body">
                            <div class="article-card__icons">
                                <div>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <?= $post->username ?>
                                </div>
                                <div>
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <?= ($post->commentCount > 0 ? $post->commentCount . ' commentaire(s)': 'Pas de commentaires') ?>
                                </div>
                                <?php if ($post->getUpdatedAt()): ?>
                                    <div>
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <?= sprintf((new DateTime($post->getUpdatedAt()))->format('d %\s Y'), $post->getMonthName('updatedAt')) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <h2 class="article-card__title">
                                <a href="<?= $templateVars['router']->generateUrl('articleShow', ['postId' => $post->getId()]) ?>">
                                    <?= $post->getTitle() ?>
                                </a>
                            </h2>

                            <p class="article-card__summary"><?= $post->getSummary() ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php include __DIR__ . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . '_sidebar.tpl.php' ?>
        </div>
    </section>
</div>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';

