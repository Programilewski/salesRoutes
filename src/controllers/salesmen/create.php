<?php

use Core\Validator;
use Core\Database;

$config = require base_path("src/config.php");

$db = new Database($config);

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
        'name' => $_POST["name"],
        'surname' => $_POST["surname"],
        'car_id' => $_POST["car_id"],
        'plates_number' => $_POST["plates_number"],
        'salesman_code' => $_POST["salesman_code"],
        'color' => $_POST["color"],
    ]);
}
header("location:/salesmen");
exit();
