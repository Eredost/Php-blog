<?php ob_start(); ?>

<div class="page">
    <section class="page-banner">
        <div class="section-wrapper">
            <div class="page-banner__head">
                <h1 class="page-banner__title">Politique de confidentialité</h1>
                <div class="page-banner__breadcrumb">
                    <a href="<?= $templateVars['router']->generate('homepage') ?>">Accueil</a>
                    > Politique de confidentialité
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-wrapper">
            <h2 class="medium-title">Qui sommes-nous ?</h2>
            <p>L’adresse de notre site Web est : http://www.blog.michael-dev.fr</p>

            <h2 class="medium-title">Utilisation des données personnelles collectées</h2>
            <h3 class="small-title">Commentaires</h3>
            <p>Quand vous laissez un commentaire sur notre site web, les données inscrites dans le formulaire de commentaire, sont collectées et stockées dans nos bases de données.</p>

            <h3 class="small-title">Médias</h3>
            <p>Si vous êtes un utilisateur ou une utilisatrice enregistré·e et que vous téléversez des images sur le site web, nous vous conseillons d’éviter de téléverser des images contenant des données EXIF de coordonnées GPS. Les visiteurs de votre site web peuvent télécharger et extraire des données de localisation depuis ces images.</p>

            <h3 class="small-title">Formulaires de contact</h3>
            <p>Quand vous envoyez un message au travers de notre formulaire de contact, aucune donnée n’est enregistrée. L’e-mail ainsi que le nom fournis nous sont transmis pour pouvoir vous contacter en cas de besoin.</p>

            <h3 class="small-title">Cookies</h3>
            <p>Lorsque vous arrivez sur le site, un cookie est automatiquement créé. Celui-ci ne contient aucune information personnelle, mais simplement une clé permettant d'identifier la session en cours.</p>

            <h3 class="small-title">Contenu embarqué depuis d'autres sites</h3>
            <p>Les articles de ce site peuvent inclure des contenus intégrés (par exemple des vidéos, images, articles…). Le contenu intégré depuis d’autres sites se comporte de la même manière que si le visiteur se rendait sur cet autre site.</p>
            <p>Ces sites web pourraient collecter des données sur vous, utiliser des cookies, embarquer des outils de suivis tiers, suivre vos interactions avec ces contenus embarqués si vous disposez d’un compte connecté sur leur site web.</p>

            <h2 class="medium-title">Utilisation et transmission de vos données personnelles</h2>
            <h3 class="small-title">Durées de stockage de vos données</h3>
            <p>Si vous laissez un commentaire, le commentaire et ses métadonnées sont conservés indéfiniment. Cela permet de reconnaître et approuver les commentaires suivants au lieu de les laisser dans la file de modération.</p>
            <p>Pour les utilisateurs et utilisatrices qui s’inscrivent sur notre site, nous stockons également les données personnelles indiquées dans leur profil. Tous les utilisateurs et utilisatrices peuvent voir leurs informations personnelles à tout moment. Les gestionnaires du site peuvent aussi voir et modifier ces informations.</p>

            <h3 class="small-title">Les droits que vous avez sur vos données</h3>
            <p>Si vous avez un compte ou si vous avez laissé des commentaires sur le site, vous pouvez demander à recevoir un fichier contenant toutes les données personnelles que nous possédons à votre sujet, incluant celles que vous nous avez fournies. Vous pouvez également demander la suppression des données personnelles vous concernant. Cela ne prend pas en compte les données stockées à des fins administratives, légales ou pour des raisons de sécurité.</p>

            <h2 class="medium-title">Informations de contact</h2>
            <p>
                Email : hello@michael-dev.fr <br>
                Tél. : 06 21 31 33 42
            </p>
        </div>
    </section>
</div>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
