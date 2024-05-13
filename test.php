<?php
require "Database.php";
$config = require "config.php";

header("Content-Type: application/json");
$db  = new Database($config, "izak", "103@Ny4ff");
$db->query("SELECT * FROM test");
dd($db->fetchAllDataAssoc());
