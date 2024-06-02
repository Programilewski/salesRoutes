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
function partials($name, $attributes = [])
{
    extract($attributes);
    require base_path("src/views/partials/" . $name);
}
