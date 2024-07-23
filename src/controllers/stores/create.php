<?php

use Core\Database;


$config = require base_path("src/config.php");
$db = new Database($config);
// dd($_POST);
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



// "voivodeship" => $_POST["voivodeship"],
// "city" => $_POST["city"],
// "zip_code" => $_POST["zip_code"],
// "street_name" => $_POST["street_name"],
// "street_number" => $_POST["street_number"],
// "apartment_number" => $_POST["apartment_number"],
// "latitude" => $_POST["latitude"],
// "longitude" => $_POST["longitude"],
// "salesman_id" => $_POST["salesman_code"],