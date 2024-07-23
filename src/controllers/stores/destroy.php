<?php

use Core\Database;

// dd("Hello");
$config = require base_path("src/config.php");
$db = new Database($config);

$db->query("DELETE FROM stores WHERE store_id = :id", [
    // "id" => $_POST["id"]
    [
        "key" => "id",
        "value" => $_POST["id"],
        "type" => PDO::PARAM_INT
    ]

]);

header("location:/stores");
exit();
