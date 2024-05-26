<?php
require __DIR__ . "/../Database.php";
$config = require __DIR__ . "/../config.php";
$db = new Database($config);
$data  = $db->query("SELECT * FROM salesmen")->fetchAllDataAssoc();

require __DIR__ . "/../views/homepage.view.php";


