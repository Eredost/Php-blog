<?php ob_start(); ?>

<p>Hello world !</p>
<i class="fa fa-user" aria-hidden="true"></i>

<?php

$content = ob_get_clean();

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'base.tpl.php';
