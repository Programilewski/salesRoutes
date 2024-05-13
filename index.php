<?php

$routes = [
    "/" => "controllers/homepage.php",
    "/about" => "controllers/about.php",
    "/stores" => "controllers/stores.php",
    "/api/stores" => "controllers/API/stores.php",
    "/salesmen" => "controllers/salesmen.php",
    "/api/salesmen" => "controllers/API/salesmen.php", // List of the salesmen
    "/routes" => "controllers/routes.php",
    "/api/routes" => "controllers/API/routes.php",
    "/api/icon" => "controllers/API/icon.php",
    "/api/stopIcon" => "controllers/API/stopIcon.php"
];
$requested_uri = parse_url($_SERVER["REQUEST_URI"])["path"];
if (array_key_exists($requested_uri, $routes)) {
    require $routes[$requested_uri];
}
