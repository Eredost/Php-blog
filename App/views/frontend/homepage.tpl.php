<?php ob_start(); ?>

<section class="banner">
    <div class="section-wrapper">
        <div class="banner__head">
            <h1>Michaël COUTIN</h1>
            <p>A vos côtés pour tous vos projets web</p>
            <a href="#contact" class="button">Me contacter</a>
        </div>
        
        <div class="banner__picture">
            <img src="uploads/profile-picture.png" alt="Michaël Coutin">
        </div>
    </div>
</section>

<section class="about">
    <h2 class="section-title">A propos</h2>

    <div class="section-wrapper">
        <p>Passionné par le monde du développement, j'ai appris en grande majorité sur mon temps de pause en autodidacte à travers diverses plateformes de cours en ligne et en faisant mes premières armes avec le langage Python avant de me lancer dans le développement web.</p>
        <p>J'aime sans cesse découvrir des nouvelles technologies et me lancer des challenges.</p>

        <a href="#" class="button">
            <i class="fa fa-download" aria-hidden="true"></i>
            Télécharger mon CV
        </a>
    </div>
</section>

<section class="services">
    <h2 class="section-title">Services</h2>

    <div class="section-wrapper">
        <div class="service">
            <i class="fa fa-mobile service__icon" aria-hidden="true"></i>
            <h3 class="service__title">Design responsive</h3>
            <p class="service__description">Ajustement de designs afin de les rendre cohérents sur tous types d'appareils.</p>
        </div>

        <div class="service">
            <i class="fa fa-code service__icon" aria-hidden="true"></i>
            <h3 class="service__title">Intégration web</h3>
            <p class="service__description">Intégration de sites web sur mesure à l'aide des langages du web.</p>
        </div>

        <div class="service">
            <i class="fa fa-eye service__icon" aria-hidden="true"></i>
            <h3 class="service__title">Référencement naturel</h3>
            <p class="service__description">Boost de la visibilité de vos applications web sur les moteurs de recherche.</p>
        </div>

        <div class="service">
            <i class="fa fa-mobile service__icon" aria-hidden="true"></i>
            <h3 class="service__title">Conception web</h3>
            <p class="service__description">Réalisation de maquettes hautes fidélités pour tous vos projets web.</p>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
