<?php
require "Database.php";
$salesman_code = $_GET["salesman_code"];
$config = require "config.php";
$db = new Database($config, "izak", "103@Ny4ff");
$db->query("SELECT * FROM stores WHERE salesman_id = '$salesman_code'");

header("Content-type: application/json");
echo json_encode($db->fetchAllDataAssoc());
