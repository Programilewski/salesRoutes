<?php

use Core\App;

$db = App::resolve(Core\Database::class);


$store_id = $_GET["store_id"] ?? null;

if ($store_id) {
    $storeQuery = $db->query("SELECT * FROM stores WHERE store_id = $store_id");
    $storeData = $storeQuery->fetchAllDataAssoc();
}
$allSalesmen = $db->query("SELECT name,surname, salesman_code FROM salesmen")->fetchAllDataAssoc();

require __DIR__ . "/../../views/stores/edit.view.php";
