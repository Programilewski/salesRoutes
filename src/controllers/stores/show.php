<?php

use Core\Database;

$config  = require base_path("src/config.php");
$db = new Database($config);


$store_id = $_GET["store_id"] ?? null;
$storeQuery = $db->query("SELECT * FROM stores WHERE store_id = $store_id");
$storeData = $storeQuery->fetchAllDataAssoc();
require __DIR__ . "/../../views/stores/show.view.php";
