<?php

require_once 'vendor/autoload.php';
require_once 'src/init.php';
require_once 'config.php';

$app = new init($_SERVER['REQUEST_URI']);
$app->init();

?>