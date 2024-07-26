<?php

use Core\App;

$db = App::resolve(Core\Database::class);


$salesman_id = $_GET["salesman_id"] ?? null;
if ($salesman_id) {
    $salesmanQuery = $db->query("SELECT * FROM salesmen WHERE salesman_id = $salesman_id");
    $salesmanData = $salesmanQuery->fetchAllDataAssoc();
}
// dd($salesmanQuery);
require __DIR__ . "/../../views/salesmen/edit.view.php";
