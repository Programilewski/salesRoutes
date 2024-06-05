<?php

$router->get("/", "controllers/index.php");
$router->get("/stores", "controllers/stores/index.php");
$router->get("/salesmen", "controllers/salesmen/index.php");
$router->get("/routes", "controllers/routes/index.php");
$router->get("/api/stores", "controllers/API/stores.php");
$router->get("/api/salesmen", "controllers/API/salesmen.php");
$router->get("/api/routes", "controllers/API/routes.php");
$router->get("/api/icon", "controllers/API/icon.php");
$router->get("/api/stopIcon", "controllers/API/stopIcon.php");
$router->get("/update", "/controllers/routes/create.php");
$router->get("/stores/new", "controllers/stores/show.php");
$router->delete("/salesmen", "controllers/salesmen/destroy.php");
$router->post("/salesmen", "controllers/salesmen/create.php");
$router->delete("/stores", "controllers/stores/destroy.php");
$router->post("/stores", "controllers/stores/create.php");
