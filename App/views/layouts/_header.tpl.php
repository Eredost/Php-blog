<header class="header">
    <div>
        <div class="logo">
            <a href="<?= $templateVars['router']->generateUrl('homepage') ?>" class="logo__link">
                M.
            </a>
        </div>

        <i id="navbar-toggle" class="fa fa-bars header__navbar-toggle" aria-hidden="true"></i>

        <nav id="navbar" class="navbar">
            <ul>
                <li class="navbar__item">
                    <a href="<?= $templateVars['router']->generateUrl('homepage') ?>" class="navbar__link active">Accueil</a>
                </li>
                <li class="navbar__item">
                    <a href="<?= $templateVars['router']->generateUrl('articleList') ?>" class="navbar__link">Blog</a>
                </li>

                <?php if ($templateVars['request']->isAuthenticated()): ?>

                    <li class="navbar__item">
                        <a href="<?= $templateVars['router']->generateUrl('disconnect') ?>" class="navbar__link">Déconnexion</a>
                    </li>

                <?php else: ?>

                    <li class="navbar__item">
                        <a href="<?= $templateVars['router']->generateUrl('login') ?>" class="navbar__link">Connexion</a>
                    </li>
                    <li class="navbar__item">
                        <a href="<?= $templateVars['router']->generateUrl('signup') ?>" class="navbar__link">Inscription</a>
                    </li>

                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
