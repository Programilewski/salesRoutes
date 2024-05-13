<?php
require "Database.php";
$config = require "config.php";


$db = new Database($config, "izak", "103@Ny4ff");
$db->query("SELECT * FROM salesmen");
$data = $db->fetchAllDataAssoc();

header("Access-Control-Allow-Origin: http://routesopti.infinityfreeapp.com/");
header("Content-Type:application/json");

echo json_encode($data);
