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

// dd($errors);
if (!empty($errors)) {
    require __DIR__ . "/../../views/stores/show.view.php";
    exit();
}



$db->query("INSERT INTO stores (
    store_id,
    name,
    voivodeship,
    city,
    zip_code,
    street_name,
    street_number,
    apartment_number,
    latitude,
    longitude,
    salesman_code
) VALUES(
    NULL,
    :name,
    :voivodeship,
    :city,
    :zip_code,
    :street_name,
    :street_number,
    :apartment_number,
    :latitude,
    :longitude,
    :salesman_code
)", [
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
    ]
]);
header("location:/stores");
exit();
