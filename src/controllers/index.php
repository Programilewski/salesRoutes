<?php

use Core\App;

$db = App::resolve(Core\Database::class);
$data  = $db->query("SELECT * FROM salesmen")->fetchAllDataAssoc();

view("homepage.view.php", [
    "data" => $data,
]);
