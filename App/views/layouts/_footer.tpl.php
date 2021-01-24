<footer class="footer">
    <div class="section-wrapper">
        <div class="logo">
            <a href="<?= $templateVars['router']->generate('homepage') ?>" class="logo__link">
                M.
            </a>
        </div>

        <p class="footer__description">Blog professionnel présentant mes compétences et réalisations ainsi qu'une section blog afin de retrouver tous les articles que j'ai publiés</p>

        <div class="footer__social-links">
            <a href="https://fr-fr.facebook.com/" target="_blank">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="https://twitter.com/" target="_blank">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="https://fr.linkedin.com/in/michael-coutin" target="_blank">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="https://github.com/Eredost" target="_blank">
                <i class="fa fa-github" aria-hidden="true"></i>
            </a>
        </div>

        <div class="footer__nav">
            <p class="footer__copyrights">Copyright © 2020</p>
            <ul class="footer__links">

                <?php if ($templateVars['request']->isGranted('ROLE_ADMIN')): ?>

                    <li class="footer__link">
                        <a href="<?= $templateVars['router']->generate('adminShow') ?>">Administration</a>
                        <span class="separator">|</span>
                    </li>
                <?php endif; ?>

                <li class="footer__link">
                    <a href="<?= $templateVars['router']->generate('privacyPolicy') ?>">Politique de confidentialité</a>
                    <span class="separator">|</span>
                </li>
                <li class="footer__link">
                    <a href="<?= $templateVars['router']->generate('legalMentions') ?>">Mentions légales</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
