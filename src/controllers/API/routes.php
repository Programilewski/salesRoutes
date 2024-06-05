<?php

use Core\Database;

$config = require base_path("src/config.php");

ini_set("memory_limit", "512M");
//
$car_id = $_GET["car_id"];
$date = $_GET["date"];
$dateDayForward = $date + 86400;
$db = new Database($config);

// $data = $db->query($query, [$car_id, $date, $dateDayForward])->fetchAllDataAssoc();
$data = $db->query("SELECT * FROM routes WHERE car_id = :car_id AND time BETWEEN :date AND :dateDayForward", [
    [
        "key" => "car_id",
        "value" => $car_id,
        "type" => PDO::PARAM_STR
    ],
    [
        "key" => "date",
        "value" => $date,
        "type" => PDO::PARAM_INT
    ],
    [
        "key" => "dateDayForward",
        "value" => $dateDayForward,
        "type" => PDO::PARAM_INT
    ]
])->fetchAllDataAssoc();
//$data = $db->fetchAllDataAssoc();
//dd($data);

header("Content-Type: application/json");
echo json_encode($data);
