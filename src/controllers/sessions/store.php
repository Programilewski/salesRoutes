<?php

use Core\Validator;
use Core\Database;
use Core\App;


$db = App::resolve(Database::class);

$email = $_POST["email"] ?? null;
$password = $_POST["password"] ?? null;
$errros = [];
if (Validator::stringZero($email)) {
    $errors["email"][] = "Pole nie może być puste";
}
if (!Validator::email($email)) {
    $errors["email"][] = "Wprowadź prawidłowy adres email";
}
if (Validator::stringZero($password)) {
    $errors["password"][] = "Pole nie może być puste";
}
if (!empty($errors)) {
    require base_path("/src/views/sessions/create.view.php");
    exit();
}

//Validate the inputs
// Check if the user exists in the database
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    [
        "key" => "email",
        "value" => $email,
        "type" => PDO::PARAM_STR
    ]
])->fetch();
//---If no, load the view with the corresponding error
if ($user) {
    if (password_verify($password, $user["password"])) {
        login($user);
        header("location:/");
        exit();
    }
}
//---If yes, create the session and load the panel
//The user found, check the password
$errors["password"][] = "Dane logowania nieprawidłowe";
require base_path("/src/views/sessions/create.view.php");
exit();
