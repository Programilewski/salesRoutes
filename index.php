<?php
include "functions.php";

$routes = [
    "/" => "controllers/homepage.php",
    "/about" => "controllers/about.php",
    "/stores" => "controllers/stores.php",
    "/salesmen" => "controllers/salesmen.php",
    "/routes" => "controllers/routes.php"
];
$requested_uri = parse_url($_SERVER["REQUEST_URI"])["path"];
if (array_key_exists($requested_uri, $routes)) {
    require $routes[$requested_uri];
}
