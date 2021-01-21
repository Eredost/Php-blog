<?php ob_start(); ?>

<div class="page">
    <section class="page-banner">
        <div class="section-wrapper">
            <div class="page-banner__head">
                <h1 class="page-banner__title">Blog</h1>
                <div class="page-banner__breadcrumb">
                    <a href="<?= $templateVars['router']->generate('homepage') ?>">Accueil</a>
                    > Blog
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="section-wrapper">

            <div class="blog__content">
                <div class="article-card">

                    <div class="article-card__image">
                        <a href="#">
                            <time class="article-card__publication-date" datetime="01-04">04 Janv</time>
                            <img src="uploads/oclock.png" alt="">
                        </a>
                    </div>

                    <div class="article-card__body">
                        <div class="article-card__icons">
                            <div>
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Michaël
                            </div>
                            <div>
                                <i class="fa fa-comment" aria-hidden="true"></i>
                                Pas de commentaires
                            </div>
                            <div>
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                04 janvier 2021
                            </div>
                        </div>
                        <h2 class="article-card__title">
                            <a href="#">Mon parcours avec l'organisme de formation O'clock</a>
                        </h2>
                        <p>J'ai pu développer de nombreuses nouvelles compétences dont relationnelles avec le projet de fin de formation.</p>
                    </div>
                </div>

                <div class="article-card">

                    <div class="article-card__image">
                        <a href="#">
                            <time class="article-card__publication-date" datetime="01-04">04 Janv</time>
                            <img src="uploads/oclock.png" alt="">
                        </a>
                    </div>

                    <div class="article-card__body">
                        <div class="article-card__icons">
                            <div>
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Michaël
                            </div>
                            <div>
                                <i class="fa fa-comment" aria-hidden="true"></i>
                                Pas de commentaires
                            </div>
                            <div>
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                04 janvier 2021
                            </div>
                        </div>
                        <h2 class="article-card__title">
                            <a href="#">Mon parcours avec l'organisme de formation O'clock</a>
                        </h2>
                        <p>J'ai pu développer de nombreuses nouvelles compétences dont relationnelles avec le projet de fin de formation.</p>
                    </div>
                </div>

                <div class="article-card">

                    <div class="article-card__image">
                        <a href="#">
                            <time class="article-card__publication-date" datetime="01-04">04 Janv</time>
                            <img src="uploads/oclock.png" alt="">
                        </a>
                    </div>

                    <div class="article-card__body">
                        <div class="article-card__icons">
                            <div>
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Michaël
                            </div>
                            <div>
                                <i class="fa fa-comment" aria-hidden="true"></i>
                                Pas de commentaires
                            </div>
                            <div>
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                04 janvier 2021
                            </div>
                        </div>
                        <h2 class="article-card__title">
                            <a href="#">Mon parcours avec l'organisme de formation O'clock</a>
                        </h2>
                        <p>J'ai pu développer de nombreuses nouvelles compétences dont relationnelles avec le projet de fin de formation.</p>
                    </div>
                </div>
            </div>

            <aside class="blog__sidebar">

                <h2 class="sidebar-title">Rechercher</h2>

                <form action="" class="search-bar" method="get">
                    <input type="text" name="search" id="search" placeholder="Votre recherche...">
                    <button type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>

                <h2 class="sidebar-title">Derniers articles</h2>

                <div>
                    <div class="article-aside">
                        <a class="article-aside__image" href="#">
                            <img src="uploads/oclock.png" alt="">
                        </a>
                        <div class="article-aside__head">
                            <h3 class="article-aside__title">
                                <a href="#">Mon parcours avec l'organisme de formation O'Clock</a>
                            </h3>
                            <time class="article-aside__publication-date">04 janvier 2021</time>
                        </div>
                    </div>

                    <div class="article-aside">
                        <a class="article-aside__image" href="#">
                            <img src="uploads/oclock.png" alt="">
                        </a>
                        <div class="article-aside__head">
                            <h3 class="article-aside__title">
                                <a href="#">Mon parcours avec l'organisme de formation O'Clock</a>
                            </h3>
                            <time class="article-aside__publication-date">04 janvier 2021</time>
                        </div>
                    </div>

                    <div class="article-aside">
                        <a class="article-aside__image" href="#">
                            <img src="uploads/oclock.png" alt="">
                        </a>
                        <div class="article-aside__head">
                            <h3 class="article-aside__title">
                                <a href="#">Mon parcours avec l'organisme de formation O'Clock</a>
                            </h3>
                            <time class="article-aside__publication-date">04 janvier 2021</time>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</div>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';

