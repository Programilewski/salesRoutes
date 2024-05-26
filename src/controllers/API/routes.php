<?php
require __DIR__ . "/../../Database.php";
$config = require __DIR__ . "/../../config.php";
ini_set("memory_limit","512M");
//
$car_id = $_GET["car_id"];
$date = $_GET["date"];
$dateDayForward = $date + 86400;
$db = new Database($config);
$query = "SELECT * FROM routes WHERE car_id = ? AND time BETWEEN ? AND ?";
//$query = "SELECT * FROM routes";
//$db->query($query,[$car_id,$date,$dateDayForward]);
$data = $db->query($query,[$car_id,$date,$dateDayForward]) -> fetchAllDataAssoc();
//$data = $db->fetchAllDataAssoc();
//dd($data);

header("Content-Type: application/json");
echo json_encode($data);
