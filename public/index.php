<?php
require __DIR__ . "/../src/functions.php";
$routes = require __DIR__ . "/../src/routes.php";
$requested_uri = parse_url($_SERVER["REQUEST_URI"])["path"];
if (array_key_exists($requested_uri, $routes)) {
    require __DIR__ . "/../src/" . $routes[$requested_uri];
}
