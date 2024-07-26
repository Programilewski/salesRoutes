<?php

use Core\Validator;

use Core\App;

$db = App::resolve(Core\Database::class);
$errors = [];

foreach ($_POST as $key => $value) {
    if ($key == "apartment_number") {
        continue;
    }
    if (Validator::stringZero($value)) {
        $errors[$key][] = "Pole nie może być puste";
    }
}
if (!Validator::stringCount($_POST["name"], 1, 40)) {
    $errors["name"][] = "Nazwa musi mieć od 1 do 40 znaków";
}


if (!empty($errors)) {
    $store_id = $_POST["store_id"] ?? null;
    if ($store_id) {
        $storeQuery = $db->query("SELECT * FROM stores WHERE store_id = $store_id");
        $storeData = $storeQuery->fetchAllDataAssoc();
    }
    $allSalesmen = $db->query("SELECT name,surname, salesman_code FROM salesmen")->fetchAllDataAssoc();
    require __DIR__ . "/../../views/stores/edit.view.php";
    exit();
}




$db->query("UPDATE stores SET 
    name = :name,
    voivodeship = :voivodeship,
    city = :city,
    zip_code = :zip_code,
    street_name = :street_name,
    street_number = :street_number,
    apartment_number = :apartment_number,
    latitude = :latitude,
    longitude = :longitude,
    salesman_code = :salesman_code WHERE store_id = :store_id", [
    [
        "key" => ":name",
        "value" => $_POST["name"],
        "type" => PDO::PARAM_STR
    ],
    [
        "key" => ":voivodeship",
        "value" => $_POST["voivodeship"],
        "type" => PDO::PARAM_STR
    ],
    [
        "key" => ":city",
        "value" => $_POST["city"],
        "type" => PDO::PARAM_STR
    ],
    [
        "key" => ":zip_code",
        "value" => $_POST["zip_code"],
        "type" => PDO::PARAM_STR
    ],
    [
        "key" => ":street_name",
        "value" => $_POST["street_name"],
        "type" => PDO::PARAM_STR
    ],
    [
        "key" => ":street_number",
        "value" => $_POST["street_number"],
        "type" => PDO::PARAM_STR
    ],
    [
        "key" => ":apartment_number",
        "value" => $_POST["apartment_number"],
        "type" => PDO::PARAM_STR
    ],
    [
        "key" => ":latitude",
        "value" => $_POST["latitude"],
        "type" => PDO::PARAM_STR
    ],
    [
        "key" => ":longitude",
        "value" => $_POST["longitude"],
        "type" => PDO::PARAM_STR
    ],
    [
        "key" => ":salesman_code",
        "value" => $_POST["salesman_code"],
        "type" => PDO::PARAM_STR
    ],
    [
        "key" => ":store_id",
        "value" => $_POST["store_id"],
        "type" => PDO::PARAM_STR
    ]
]);
header("location:/stores");
exit();
