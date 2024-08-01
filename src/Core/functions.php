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
function buildQuery($prefix, $params = [], $preserveSearch = true, $toRemove = [])
{


    $arrays = array_merge($_GET, $params);
    foreach ($toRemove as $key) {
        unset($arrays[$key]);
    }
    if (!$preserveSearch) {
        unset($arrays["search"]);
    }
    return $prefix . "?" . http_build_query($arrays);
}
function partials($name, $attributes = [])
{
    extract($attributes);
    require base_path("src/views/partials/" . $name);
}
function displayErrors($errors)
{
    foreach ($errors as $error) {
        echo "<p class='form__error'>" . $error . "</p>";
    }
}
function login($user)
{
    $_SESSION["user"] = [
        "email" => $user["email"]
    ];
    header("location:/");
    exit();
    session_regenerate_id(true);
}
function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie("PHPSESSID", "", time() - 3600, $params["path"], $params["domain"]);
}
