<?php

use Core\Router;

const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "/src/Core/functions.php";
$config = require base_path("src/config.php");

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("src/{$class}.php");
});
$requested_uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$router = new Router();
$routes = require base_path("src/routes.php");
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
// dd($routes);
$router->route($requested_uri, $method);
