<?php
require "data.php";
require "Database.php";
$config = require "config.php";
$db = new Database($config, "izak", "103@Ny4ff");
$statement = $pdo->prepare("SELECT * FROM routes");
$statement->execute();

$data = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($data);
