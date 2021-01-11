<header class="header">
    <div class="logo">
        <a href="<?= $templateVars['router']->generate('homepage') ?>" class="logo__link">
            M.
        </a>
    </div>

    <i id="navbar-toggle" class="fa fa-bars header__navbar-toggle" aria-hidden="true"></i>

    <nav id="navbar" class="navbar">
        <ul>
            <li class="navbar__item">
                <a href="#" class="navbar__link active">Accueil</a>
            </li>
            <li class="navbar__item">
                <a href="#" class="navbar__link">Blog</a>
            </li>
            <li class="navbar__item">
                <a href="#" class="navbar__link">Connexion</a>
            </li>
            <li class="navbar__item">
                <a href="#" class="navbar__link">Inscription</a>
            </li>
        </ul>
    </nav>
</header>
