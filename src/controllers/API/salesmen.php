<?php
require __DIR__ . "/../../Database.php";
$config = require __DIR__ . "/../../config.php";


$db = new Database($config);
$query = "SELECT * FROM salesmen";
$db->query($query);
//$db->query("SELECT * FROM salesmen");
$data = $db->fetchAllDataAssoc();

header("Access-Control-Allow-Origin: *");

header("Content-Type:application/json");

echo json_encode($data);
