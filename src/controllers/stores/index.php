<?php
header("Access-Control-Allow-Origin: *");
$config = require base_path("src/config.php");

use Core\Database;

$db = new Database($config);
$base_query = "SELECT * FROM stores";
$allowed_filters = ["salesman_code", "city"];
$base_query = $base_query;
$filters_amount = 0;
$filters_query = "";
foreach ($_GET as $key => $value) {
    if (in_array($key, $allowed_filters)) {
        $filters_amount = $filters_amount + 1;
        $filters_query = $filters_query . " " .  $key .  " = " . "'" . $value . "'" . " AND";
    }
}
$filters_query = preg_replace('/\s*AND\s*$/', '', $filters_query);
if ($filters_amount !== 0) {
    $base_query = $base_query . " WHERE" . $filters_query;
}

// Searching by the value
$searchValue = $_GET["search"] ?? false;
if ($searchValue) {
    if ($filters_amount !== 0) {
        $base_query = $base_query . " AND name LIKE '%" . $searchValue . "%'";
    } else {
        $base_query = $base_query . " WHERE name LIKE '%" . $searchValue . "%'";
    }
}

// Sorting the results

$orderBy = $_GET["orderby"] ?? false;
$order = $_GET["order"] ?? false;
if ($orderBy && $order) {
    $base_query = $base_query . " ORDER BY " . $orderBy . " " . $order;
}

// Pagination
$page_number = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1;
$stores_per_page = $_GET["rows_per_page"] ?? 10;
$startValue = ($page_number - 1) * $stores_per_page;
$endValue = $page_number * $stores_per_page;
$order = $_GET["order"] ?? false;
$asc_or_desc = $order === "ASC" ? "DESC" : "ASC";
$the_limit = " LIMIT 0,25";

$base_query = $base_query . " LIMIT " . $startValue . "," . $stores_per_page;
$salesmen = $db->query("SELECT * FROM salesmen")->fetchAllDataAssoc();
$cities = $db->query("SELECT DISTINCT city FROM stores")->fetchAllDataAssoc();
$limit_position_in_base_query = strpos($base_query, "LIMIT");
$query_without_limit = substr($base_query, 0, $limit_position_in_base_query - 1);
$rows_number = $db->query($query_without_limit)->countRows();
$data = $db->query($base_query, [])->fetchAllDataAssoc();
// dd($rows_number);

require __DIR__ . "/../../views/stores/index.view.php";
