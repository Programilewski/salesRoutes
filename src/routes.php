<?php

// Main pages
$router->get("/", "controllers/index.php")->only("auth");
$router->get("/stores", "controllers/stores/index.php")->only("auth");
$router->get("/salesmen", "controllers/salesmen/index.php")->only("auth");

// API endpoints
$router->get("/api/stores", "controllers/API/stores.php");
$router->get("/api/salesmen", "controllers/API/salesmen.php");
$router->get("/api/routes", "controllers/API/routes.php");
$router->get("/api/icon", "controllers/API/icon.php");
$router->get("/api/stopIcon", "controllers/API/stopIcon.php");

// Store operations
$router->get("/stores/new", "controllers/stores/show.php")->only("auth");
$router->get("/stores/edit", "controllers/stores/edit.php")->only("auth");
$router->post("/stores", "controllers/stores/create.php")->only("auth");
$router->delete("/stores", "controllers/stores/destroy.php")->only("auth");
$router->patch("/stores", "controllers/stores/update.php")->only("auth");

// Registration operations
$router->get("/register", "controllers/registration/create.php")->only("guest");
$router->post("/register", "controllers/registration/store.php")->only("guest");

// Sessions operations
$router->get("/login", "controllers/sessions/create.php")->only("guest");
$router->post("/sessions", "controllers/sessions/store.php");
$router->delete("/sessions", "controllers/sessions/destroy.php")->only("auth");

// Salesman operations
$router->get("/salesmen/new", "controllers/salesmen/show.php")->only("auth");
$router->get("/salesmen/edit", "controllers/salesmen/edit.php")->only("auth");
$router->post("/salesmen", "controllers/salesmen/create.php")->only("auth");
$router->delete("/salesmen", "controllers/salesmen/destroy.php")->only("auth");
$router->patch("/salesmen", "controllers/salesmen/update.php")->only("auth");

// Route operations
$router->get("/update", "/controllers/routes/create.php")->only("auth");
