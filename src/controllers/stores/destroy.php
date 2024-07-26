<?php


use Core\App;

$db = App::resolve(Core\Database::class);

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
