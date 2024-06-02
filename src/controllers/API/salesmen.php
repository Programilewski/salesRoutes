<?php

use Core\Database;

$config = require base_path("src/config.php");

$db = new Database($config);
$query = "SELECT * FROM salesmen";
$db->query($query);
//$db->query("SELECT * FROM salesmen");
$data = $db->fetchAllDataAssoc();

header("Access-Control-Allow-Origin: *");

header("Content-Type:application/json");

echo json_encode($data);
