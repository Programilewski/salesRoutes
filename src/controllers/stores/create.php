<?php

use Core\Database;

$config = require base_path("src/config.php");
$db = new Database($config);

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
    salesman_id
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
    :salesman_id
)", [
    "name" => $_POST["name"],
    "voivodeship" => $_POST["voivodeship"],
    "city" => $_POST["city"],
    "zip_code" => $_POST["zip_code"],
    "street_name" => $_POST["street_name"],
    "street_number" => $_POST["street_number"],
    "apartment_number" => $_POST["apartment_number"],
    "latitude" => $_POST["latitude"],
    "longitude" => $_POST["longitude"],
    "salesman_id" => $_POST["salesman_code"],
]);

header("location:/stores");
exit();
