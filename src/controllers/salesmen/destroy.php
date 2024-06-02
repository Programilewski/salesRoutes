<?php

use Core\Database;

echo "XD";
$config = require base_path("src/config.php");
$db = new Database($config);
$db->query("DELETE FROM salesmen WHERE salesman_id = :id", [
    "id" => $_POST["id"]
]);


header("location:/salesmen");
exit();
