<?php

$root = __DIR__ . '/..';

require_once $root . '/vendor/autoload.php';

use Bookstore\Core\Router;
use Bookstore\Controllers\TodoController;

Router::load($root . '/src/routes.php')->direct(getUri(), getMethod());
