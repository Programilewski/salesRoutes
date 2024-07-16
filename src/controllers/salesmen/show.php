<?php

use Core\Database;

$config  = require base_path("src/config.php");
$db = new Database($config);


$salesman_id = $_GET["salesman_id"] ?? null;
// dd($salesman_id);
if ($salesman_id) {
    $salesmanQuery = $db->query("SELECT * FROM salesmen WHERE salesman_id = $salesman_id");
}
// dd($salesmanQuery);
// $salesmanData = $salesmanQuery->fetchAllDataAssoc();
require __DIR__ . "/../../views/salesmen/show.view.php";
