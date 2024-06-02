<?php
header("Access-Control-Allow-Origin: *");

use Core\Database;
use Core\Validator;

$config = require base_path("src/config.php");

$db = new Database($config);

$data  = $db->query("SELECT * FROM salesmen")->fetchAllDataAssoc();
view("salesmen/index.view.php", [
    "data" => $data,
    "errors" => $errors ?? []
]);
