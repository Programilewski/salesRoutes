<?php

use Core\Database;

$config  = require base_path("src/config.php");
$db = new Database($config);


$salesman_id = $_GET["salesman_id"] ?? null;
if ($salesman_id) {
    $salesmanQuery = $db->query("SELECT * FROM salesmen WHERE salesman_id = $salesman_id");
    $salesmanData = $salesmanQuery->fetchAllDataAssoc();
}
// dd($salesmanQuery);
require __DIR__ . "/../../views/salesmen/show.view.php";
