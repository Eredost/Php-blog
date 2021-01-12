<?php ob_start(); ?>

<!-- Banner section -->
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
<!-- Banner section END -->

<!-- About section -->
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
<!-- About section END -->

<!-- Services section -->
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
<!-- Services section END -->

<!-- Experiences section -->
<section class="experiences">
    <h2 class="section-title">Expériences</h2>

    <div class="section-wrapper">
        <div class="experience">
            <div class="experience__date">
                <time class="experience__date" datetime="2020-06">Juin 2020</time> -
                <time class="experience__date" datetime="2020-06">Sep 2020</time>
            </div>
            <h3 class="experience__title">Développeur web</h3>
            <p class="experience__company">OpenClassrooms</p>

            <p class="experience__description">Utilisation du langage Javascript, du serveur NodeJS, du framework Express et des outils Sequelize et Mongoose. Amélioration du référencement de sites web existant.</p>
        </div>

        <div class="experience">
            <div class="experience__date">
                <time class="experience__date" datetime="2020-06">Juin 2020</time> -
                <time class="experience__date" datetime="2020-06">Sep 2020</time>
            </div>
            <h3 class="experience__title">Développeur web</h3>
            <p class="experience__company">OpenClassrooms</p>

            <p class="experience__description">Utilisation du langage Javascript, du serveur NodeJS, du framework Express et des outils Sequelize et Mongoose. Amélioration du référencement de sites web existant.</p>
        </div>

        <div class="experience">
            <div class="experience__date">
                <time class="experience__date" datetime="2020-06">Juin 2020</time> -
                <time class="experience__date" datetime="2020-06">Sep 2020</time>
            </div>
            <h3 class="experience__title">Développeur web</h3>
            <p class="experience__company">OpenClassrooms</p>

            <p class="experience__description">Utilisation du langage Javascript, du serveur NodeJS, du framework Express et des outils Sequelize et Mongoose. Amélioration du référencement de sites web existant.</p>
        </div>
    </div>
</section>
<!-- Experiences section END -->

<!-- Contact section -->
<section class="contact" id="contact">
    <h2 class="section-title">Contact</h2>

    <div class="section-wrapper">
        <!-- Contact info -->
        <div class="contact-info">
            <h3 class="contact-info__title">Infos de contact</h3>

            <div class="contact-info__block">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                Wizernes, France
            </div>
            <div class="contact-info__block">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                michael.coutin62@gmail.com
            </div>
            <div class="contact-info__block">
                <i class="fa fa-phone" aria-hidden="true"></i>
                +33 6 21 31 33 42
            </div>
            <div class="contact-info__block">
                <i class="fa fa-globe" aria-hidden="true"></i>
                www.michael-dev.fr
            </div>
            <div class="contact-info__block">
                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                linkedin.com/in/michael-coutin/
            </div>
            <div class="contact-info__block">
                <i class="fa fa-github" aria-hidden="true"></i>
                github.com/Eredost
            </div>
        </div>

        <!-- Contact form -->
        <div class="contact-form">
            <form class="form" action="" method="post">
                <div class="form__group--flex">
                    <div class="form__group">
                        <label for="name" class="form__label">Nom <span class="required">*</span></label>
                        <input name="name" id="name" type="text" class="form__input" placeholder="Votre nom">
                    </div>
                    <div class="form__group">
                        <label for="email" class="form__label">Email <span class="required">*</span></label>
                        <input name="email" id="email" type="email" class="form__input" placeholder="Votre email">
                    </div>
                </div>
                <div class="form__group">
                    <label for="subject" class="form__label">Sujet <span class="required">*</span></label>
                    <input name="subject" id="subject" type="text" class="form__input" placeholder="Le sujet de votre message">
                </div>
                <div class="form__group">
                    <label for="message" class="form__label">Message <span class="required">*</span></label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form__input" placeholder="Votre message"></textarea>
                </div>

                <input type="submit" value="Envoyer" class="button square">
            </form>
        </div>
    </div>
</section>
<!-- Contact section END -->

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
