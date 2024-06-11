<?php


function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}
function base_path($path)
{
    return BASE_PATH . $path;
}
function view($name, $attributes = [])
{
    extract($attributes);
    require base_path("src/views/" . $name);
}
function media($path)
{
    return base_path("public/assets/media/" . $path);
}
function buildQuery($prefix, $params)
{
    $arrays = array_merge($_GET, $params);
    return $prefix . "?" . http_build_query($arrays);
}
function partials($name, $attributes = [])
{
    extract($attributes);
    require base_path("src/views/partials/" . $name);
}
