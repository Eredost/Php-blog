<?php ob_start(); ?>

<section>
    <div class="section-wrapper">
        <div class="login">

        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
