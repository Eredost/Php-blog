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
    <div class="section-wrapper">
        <h2 class="section-title">A propos</h2>

        <p>Passionné par le monde du développement, j'ai appris en grande majorité sur mon temps de pause en autodidacte à travers diverses plateformes de cours en ligne et en faisant mes premières armes avec le langage Python avant de me lancer dans le développement web.</p>
        <p>J'aime sans cesse découvrir des nouvelles technologies et me lancer des challenges.</p>

        <a href="#" class="button">
            <i class="fa fa-download" aria-hidden="true"></i>
            Télécharger mon CV
        </a>
    </div>
</section>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
