<aside class="blog__sidebar">

    <form action="<?= $templateVars['router']->generate('articleList') ?>" class="search-bar" method="get">
        <input type="text" name="search" id="search" placeholder="Votre recherche...">
        <button type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </form>

    <h2 class="sidebar-title">Derniers articles</h2>

    <div>

        <?php foreach($templateVars['posts'] as $post): ?>

            <div class="article-aside">
                <a class="article-aside__image" href="<?= $templateVars['router']->generate('articleShow', ['id' => $post->getId()]) ?>">
                    <img src="<?= $post->getImage() ?>" alt="">
                </a>
                <div class="article-aside__head">
                    <h3 class="article-aside__title">
                        <a href="<?= $templateVars['router']->generate('articleShow', ['id' => $post->getId()]) ?>"><?= $post->getTitle() ?></a>
                    </h3>
                    <time class="article-aside__publication-date" datetime="<?= (new DateTime($post->getCreatedAt()))->format('Y-m-d') ?>">
                        <?=
                        preg_replace_callback('/\/(\d{1,2})/', function($matches) {
                            return numberToFullyMonthName($matches[1]);
                        }, (new DateTime($post->getCreatedAt()))->format('d /n Y'))
                        ?>
                    </time>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</aside>
