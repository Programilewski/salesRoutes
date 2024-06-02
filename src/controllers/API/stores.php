<?php

use Core\Database;

$config = require base_path("src/config.php");

$db = new Database($config);
$baseQuery = "SELECT * FROM stores ";
$paramsNumber = count($_GET);
switch (true) {
    case $paramsNumber === 0;
        break;

    case $paramsNumber === 1;

        $paramKey = array_key_first($_GET);
        $paramValue = $_GET[$paramKey];
        if ($paramKey === "limit") {
            break;
        }
        $baseQuery = $baseQuery . " WHERE $paramKey = " . "'$paramValue'";
        break;

    case $paramsNumber > 1;
        $baseQuery .= " WHERE ";
        $paramString  = "";
        foreach ($_GET as $key => $value) {
            if ($key === "limit") {
                continue;
            }
            $paramString .= " $key = '$value' AND";
        }
        $baseQuery .= $paramString;
        $baseQuery = substr($baseQuery, 0, -3);
        break;
}
if (isset($_GET["limit"])) {
    $limitValue = $_GET["limit"];
    $baseQuery .= "LIMIT $limitValue";
}
//dd($baseQuery);

header("Content-type: application/json");

$db->query($baseQuery);
$data = json_encode($db->fetchAllDataAssoc());

echo $data;
