<?php

use Core\Database;

$config  = require base_path("src/config.php");
$db = new Database($config);


$store_id = $_GET["store_id"] ?? null;

if ($store_id) {
    $storeQuery = $db->query("SELECT * FROM stores WHERE store_id = $store_id");
    $storeData = $storeQuery->fetchAllDataAssoc();
}
$allSalesmen = $db->query("SELECT name,surname, salesman_code FROM salesmen")->fetchAllDataAssoc();

require __DIR__ . "/../../views/stores/show.view.php";
