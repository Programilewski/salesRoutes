<?php
header("Access-Control-Allow-Origin: *");
$config = require base_path("src/config.php");

use Core\Database;

$db = new Database($config);

$total_pages = $db->query("SELECT COUNT(*) FROM stores")->fetchAllDataAssoc()[0]["COUNT(*)"];
$page_number = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1;
$stores_per_page = 30;

$startValue = ($page_number - 1) * $stores_per_page;
$endValue = $page_number * $stores_per_page;
$data  = $db->query(
    "SELECT * FROM stores LIMIT :start , :end",
    [
        [
            "key" => "start",
            "value" => $startValue,
            "type" => PDO::PARAM_INT
        ],
        [
            "key" => "end",
            "value" => $stores_per_page,
            "type" => PDO::PARAM_INT
        ]
    ]
)->fetchAllDataAssoc();
require __DIR__ . "/../../views/stores/index.view.php";
//
//
//
// 1,2,3,4,5...128
//1 [2] 3 4 6 ... 128
//1,2,[3],4,5,6,7,8...128
//1,2,3,[4],5,6,7,8,9...128