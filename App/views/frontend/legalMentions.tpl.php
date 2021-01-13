<?php ob_start(); ?>

<section class="page-banner">
    <div class="section-wrapper">
        <div class="page-banner__head">
            <h1 class="page-banner__title">Mentions légales</h1>
            <div class="page-banner__breadcrumb">
                <a href="<?= $templateVars['router']->generate('homepage') ?>">Accueil</a>
                > Mentions légales
            </div>
        </div>
    </div>
</section>

<section>
    <div class="section-wrapper">
        <p class="center">En vigueur au 08/01/2020</p>
        <p>Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004 pour la Confiance dans l’économie numérique, dite L.C.E.N., il est porté à la connaissance des Utilisateurs du site Michael-dev les présentes mentions légales.</p>
        <p>La connexion et la navigation sur le site Michael-dev par l’utilisateur implique l’acceptation intégrale et sans réserve des présentes mentions légales.</p>

        <h2 class="medium-title">Editeur du site</h2>
        <p>
            Michaël Coutin – 57 rue Bernard Chochoy 62570 Wizernes <br>
            Tél. : 06 21 31 33 42 <br>
            Email : michael.coutin62@gmail.com
        </p>

        <h2 class="medium-title">Hébergeur</h2>
        <p>
            OVH (www.ovh.com) <br>
            SAS au capital de 10 069 020 € <br>
            RCS Lille Métropole 424 761 419 00045 <br>
            Code APE 2620Z <br>
            N° TVA : FR 22 424 761 419 <br>
            Siège social : 2 rue Kellermann – 59100 Roubaix – France <br>
        </p>

        <h2 class="medium-title">Accès au site</h2>
        <p>Le site est accessible par tout endroit, 7j/7, 24h/24 sauf cas de force majeure, interruption programmée ou non et pouvant découlant d’une nécessité de maintenance.</p>
        <p>En cas de modification, interruption ou suspension des services le site Michael-dev ne saurait être tenu responsable.</p>

        <h2 class="medium-title">Collecte des données</h2>
        <p>Le site est exempté de déclaration à la Commission Nationale Informatique et Libertés (CNIL) dans la mesure où il ne collecte aucune donnée concernant les utilisateurs.</p>

        <h2 class="medium-title">Propriété intellectuelle</h2>
        <p>Toute utilisation, reproduction, diffusion, commercialisation, modification de toute ou partie du site Michael-dev, sans autorisation de l’éditeur est prohibée et pourra entraînée des actions et poursuites judiciaires telles que notamment prévues par le Code de la propriété intellectuelle et le Code civil.</p>
    </div>
</section>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
