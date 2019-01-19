<?php

$root = __DIR__ . '/..';

require_once $root . '/vendor/autoload.php';

use Todo\Core\Router;

Router::load($root . '/src/routes.php')->direct(getUri(), getMethod());
