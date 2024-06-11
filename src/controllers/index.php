<?php

use Core\Database;

$config = require base_path("src/config.php");
$db = new Database($config);
$data  = $db->query("SELECT * FROM salesmen")->fetchAllDataAssoc();

view("homepage.view.php", [
    "data" => $data,
]);
