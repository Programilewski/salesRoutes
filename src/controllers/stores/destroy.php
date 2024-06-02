<?php

use Core\Database;

$config = require base_path("src/config.php");
$db = new Database($config);

$db->query("DELETE FROM stores WHERE store_id = :id", [
    "id" => $_POST["id"]
]);

header("location:/stores");
exit();
