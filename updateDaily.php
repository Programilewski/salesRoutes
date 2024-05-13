<?php
require "Database.php";
$cofing = require "config.php";

function sendCurlRequest($car_id, $date_from, $date_to)
{
    $ch = curl_init("https://api.gps2.solidsecurity.pl/message/new/{$car_id}/{$date_from}/{$date_to}");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization:20f9bf2f595c10cad6dfdfa2e44325e2dda41000"
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
function convertRetrievedData($response)
{
    $resJSON = json_decode($response, true);
    $frames = $resJSON["frames"];
    $data = array();
    foreach ($frames as $frame) {
        array_push($data, array(
            "car_id" => $frame["car"],
            "is_engine_ignited" => $frame["ignition"],
            "speed" => $frame["speed"],
            "latitude" => $frame["latitude"],
            "longitude" => $frame["longitude"],
            "time" => $frame["time"],
        ));
    }
    return $data;
}
$db = new Database($config, "izak", "103@Ny4ff");
$db->query("SELECT * FROM salesmen WHERE car_id > 0");
$listOfSalesmen = $db->fetchAllDataAssoc();
foreach ($listOfSalesmen as $salesman) {
    $salesman_car = $salesman["car_id"];
    $db = new Database($config, "izak", "103@Ny4ff");
    $db->query("SELECT MAX(time) FROM routes WHERE car_id = $salesman_car");
    $fetchedResults = $db->fetchSingle();
    $newestRouteTime = $fetchedResults["MAX(time)"];
    $sundayBegin = 1714687200;
    $sundayEnd = 1714773600;
    $currentTime = time();
    $apiData = sendCurlRequest($salesman["car_id"], $newestRouteTime, $currentTime);
    if (count(json_decode($apiData, true)) === 2) {
        echo "No Data ";
        continue;
    }
    $convertedApiData = convertRetrievedData($apiData);
    echo "==========";
    echo "<br>";
    foreach ($convertedApiData as $route) {
        $car_id = $route["car_id"];
        $is_engine_ignited = $route["is_engine_ignited"];
        $speed = $route["speed"];
        $latitude = $route["latitude"];
        $longitude = $route["longitude"];
        $time = $route["time"];
        var_dump($car_id, $is_engine_ignited, $speed, $latitude, $longitude, $time);
        $db->query("INSERT INTO routes 
        (
            route_id,
            car_id,
            is_engine_ignited,
            speed,
            latitude,
            longitude,
            time
        ) VALUES(
            NULL,
            $car_id, 
            $is_engine_ignited, 
            $speed, 
            $latitude, 
            $longitude, 
            $time 
        )");
    }
    echo "==========";
}

/// Get the list of the salesmen

/// Loop over them, in each iteration:
//////Get the newest date from the database based on the car_id
//////Send a request to the API with the range of newest day and today's date
//////Convert the date 
//////Upload it to the database
