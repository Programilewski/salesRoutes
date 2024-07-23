<?php

use Core\Validator;
use Core\Database;

$config = require base_path("src/config.php");
// echo "XDDD";
$db = new Database($config);
// dd($_POST);
$errors = [];

$name = $_POST["name"];
$surname = $_POST["surname"];
$car_id = $_POST["car_id"];
$plates_number = $_POST["plates_number"];
$salesman_code = $_POST["salesman_code"];
$color = $_POST["color"];

foreach ($_POST as $key => $value) {
    if (Validator::stringZero($value)) {
        $errors[$key] = "Pole " . $key . " nie może być puste";
    }
}
if (!Validator::isNumeric($car_id)) {
    $errors[$car_id] = "ID auta może zawierać tylko cyfry";
}
if (!Validator::isPositive($car_id)) {
    $errors[$car_id] = "Cyfra nie może być ujemna";
}
if (empty($errors)) {
    $db->query("INSERT INTO salesmen (salesman_id, name, surname, car_id, plates_number, salesman_code, color) VALUES (NULL,:name ,:surname ,:car_id ,:plates_number ,:salesman_code ,:color )", [
        [
            'key' => 'name',
            "value" => $_POST["name"],
            "type" => PDO::PARAM_STR
        ],
        [
            'key' => 'surname',
            "value" => $_POST["surname"],
            "type" => PDO::PARAM_STR
        ],
        [
            'key' => 'car_id',
            "value" => $_POST["car_id"],
            "type" => PDO::PARAM_INT
        ],
        [
            'key' => 'plates_number',
            "value" => $_POST["plates_number"],
            "type" => PDO::PARAM_STR
        ],
        [
            'key' => 'salesman_code',
            "value" => $_POST["salesman_code"],
            "type" => PDO::PARAM_STR
        ],
        [
            'key' => 'color',
            "value" => $_POST["color"],
            "type" => PDO::PARAM_STR
        ]
    ]);
}
header("location:/salesmen");
exit();
