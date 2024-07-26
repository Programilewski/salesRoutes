<?php

use Core\Validator;
use Core\App;

$db = App::resolve(Core\Database::class);
$errors = [];

foreach ($_POST as $key => $value) {
    if (Validator::stringZero($value)) {
        $errors[$key][] = "Pole nie może być puste";
    }
}
if (!Validator::isNumeric($_POST["car_id"])) {
    $errors["car_id"][] = "ID auta może zawierać tylko cyfry";
}
if (!Validator::isPositive($_POST["car_id"])) {
    $errors["car_id"][] = "Cyfra nie może być ujemna";
}
if (!Validator::stringCount($_POST["name"], 1, 40)) {
    $errors["name"][] = "Imie musi mieć od 1 do 40 znaków";
}
if (!Validator::stringCount($_POST["color"], 6, 7)) {
    $errors["color"][] = "Kolor musi być w poprawnym formacie (#000000 bądź 000000)";
}


if (!empty($errors)) {
    $salesman_id = $_POST["salesman_id"] ?? null;
    if ($salesman_id) {
        $salesmanQuery = $db->query("SELECT * FROM salesmen WHERE salesman_id = $salesman_id");
        $salesmanData = $salesmanQuery->fetchAllDataAssoc();
    }
    require __DIR__ . "/../../views/salesmen/edit.view.php";
    exit();
}
$db->query("UPDATE salesmen SET 
 name = :name,
 surname = :surname ,
 car_id = :car_id ,
 plates_number = :plates_number ,
 salesman_code = :salesman_code ,
 color = :color WHERE salesman_id = :salesman_id", [
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
    ],
    [
        'key' => 'salesman_id',
        "value" => $_POST["salesman_id"],
        "type" => PDO::PARAM_INT
    ]
]);
header("location:/salesmen");
die();
