<?php

use Core\Database;
use Core\App;

$db = App::resolve(Core\Database::class);

$db->query("DELETE  FROM salesmen WHERE salesman_id = :id", [
    [
        'key' => 'id',
        "value" => $_POST["salesman_id"],
        "type" => PDO::PARAM_INT
    ]
]);


header("location:/salesmen");
exit();
