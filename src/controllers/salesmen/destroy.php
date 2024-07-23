<?php

use Core\Database;

// echo "XD";
$config = require base_path("src/config.php");
$db = new Database($config);
$db->query("DELETE  FROM salesmen WHERE salesman_id = :id", [
    [
        'key' => 'id',
        "value" => $_POST["salesman_id"],
        "type" => PDO::PARAM_INT
    ]
]);


header("location:/salesmen");
exit();
