<?php
require "Database.php";
$config = require "config.php";


$db = new Database($config, "izak", "103@Ny4ff");
$db->query("SELECT * FROM salesmen");
$data = $db->fetchAllDataAssoc();

header("Content-Type:application/json");

echo json_encode($data);
