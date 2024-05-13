<?php
require "Database.php";
$config = require "config.php";

$car_id = $_GET["car_id"];
$date = $_GET["date"];
$dateDayForward = $date + 86400;
$db = new Database($config, "izak", "103@Ny4ff");
// $rrr = array(
//     "car_id" => $_GET["car_id"],
//     "date" => $_GET["date"]
// );
$db->query("SELECT * FROM routes WHERE car_id = $car_id AND time BETWEEN $date AND $dateDayForward");
$data = $db->fetchAllDataAssoc();

// dd($data);

header("Content-Type: application/json");
echo json_encode($data);
