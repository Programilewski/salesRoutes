<?php
header("Access-Control-Allow-Origin: *");

use Core\App;

$db = App::resolve(Core\Database::class);

$total_count = $db->query("SELECT COUNT(*) FROM routes")->fetchAllDataAssoc()[0]["COUNT(*)"];
$page_number = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1;
$stores_per_page = 15;
$last_page = round($total_count / $stores_per_page) + 1;

$startValue = ($page_number - 1) * $stores_per_page;
$endValue = $page_number * $stores_per_page;
$data  = $db->query(
    "SELECT * FROM routes LIMIT :start , :end",
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


require __DIR__ . "/../../views/routes/index.view.php";
