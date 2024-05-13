<?php
require "data.php";
require "Database.php";
$config = require "config.php";

function mostRecentRoute($config)
{
    $db = new Database($config, "izak", "103@Ny4ff");
    $db->query("SELECT MAX(time) FROM routes");
    $time = $db->fetchSingle();
    return $time["MAX(time)"];
}


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
function getCarHistory($car_id, $date_from, $date_to)
{
    $response = sendCurlRequest($car_id, $date_from, $date_to);
    $data = convertRetrievedData($response);
    return $data;
}
// teraz - 1715244432
// 1 Stycznia - 1704063600
// 1 Luty - 1706742000
// 1 Marca - 1709247600
// 1 Kwietnia - 1711922400
// 15 Kwietnia - 1713132000
$secondsInDay = 86400;
// $data = convertRetrievedData(sendCurlRequest(106019, 1704063600, 1715244432));
// FROM JANUARY TO MARCH
// $data = convertRetrievedData(sendCurlRequest(106019, 1704063600, 1709247600));
// FROM MARCH TO THIS DAY
$data = convertRetrievedData(sendCurlRequest(112256, 1713132000, 1715244432));
// dd($data);
$db = new Database($config, "izak", "103@Ny4ff");
foreach ($data as $route) {
    $car_id = $route["car_id"];
    $is_engine_ignited = $route["is_engine_ignited"];
    $speed = $route["speed"];
    $latitude = $route["latitude"];
    $longitude = $route["longitude"];
    $time = $route["time"];
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
