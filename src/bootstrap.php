<?php

use Core\Container;
use Core\Database;
use Core\App;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require base_path("src/config.php");
    return new Database($config);
});

App::setContainer($container);
