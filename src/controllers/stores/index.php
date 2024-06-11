<?php
header("Access-Control-Allow-Origin: *");
$config = require base_path("src/config.php");



use Core\Database;

$db = new Database($config);
$columns = $db->query("SELECT column_name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'stores'")->fetchAllDataAssoc();
$sortBy = $_GET["sortby"] ?? false;
$sortOrder = $_GET["sortorder"] ?? false;
$total_count = $db->query("SELECT COUNT(*) FROM stores")->fetchAllDataAssoc()[0]["COUNT(*)"];
$salesmen = $db->query("SELECT * FROM salesmen")->fetchAllDataAssoc();
$page_number = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1;
$stores_per_page = 15;
$last_page = round($total_count / $stores_per_page) + 1;
$startValue = ($page_number - 1) * $stores_per_page;
$endValue = $page_number * $stores_per_page;
$asc_or_desc = $sortOrder == "ASC" ? "DESC" : "ASC";
$search = $_GET["search"] ?? false;
if ($search) {
    $data  = $db->query(
        "SELECT * FROM stores WHERE name LIKE '%$search%'",
        []
    )->fetchAllDataAssoc();
} else {
    if ($sortBy) {
        $data  = $db->query(
            "SELECT * FROM stores ORDER BY $sortBy $sortOrder LIMIT :start , :end",
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
    } else {

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
    }
}

require __DIR__ . "/../../views/stores/index.view.php";
