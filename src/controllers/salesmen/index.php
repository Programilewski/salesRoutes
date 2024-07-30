<?php
header("Access-Control-Allow-Origin: *");

use Core\App;

$db = App::resolve(Core\Database::class);

$data  = $db->query("SELECT * FROM salesmen")->fetchAllDataAssoc();
view("salesmen/index.view.php", [
    "data" => $data,
    "errors" => $errors ?? []
]);
