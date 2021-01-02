<?php ob_start(); ?>

<h1>Hello les amis</h1>
<p>Hello world !</p>
<i class="fa fa-user" aria-hidden="true"></i>

<?php

$content = ob_get_clean();
$baseTemplate = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.tpl.php';
include $baseTemplate;
