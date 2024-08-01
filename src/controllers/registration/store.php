<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'] ?? null;
$name = $_POST['name'] ?? null;
$surname = $_POST['surname'] ?? null;
$password = $_POST['password'] ?? null;
$repeated_password = $_POST['repeated_password'] ?? null;
$errors = [];

//Validate the inputs
if (!Validator::email($email)) {
    $errors['email'][] = "Niepoprawny adres email";
}
if (!Validator::stringCount($email, 1, 100)) {
    $errors['email'][] = "Adres email powinien zawierać od 1 do 100 znaków";
}
if (!validator::stringCount($name, 1, 100)) {
    $errors['name'][] = "Imię musi mieć od 1 do 100 znaków";
}
if (!validator::stringCount($surname, 1, 100)) {
    $errors['surname'][] = "Nazwisko musi mieć od 1 do 100 znaków";
}
if ($repeated_password !== $password) {
    $errors['repeated_password'][] = "Hasła muszą być takie same";
}

if (!empty($errors)) {
    require base_path("/src/views/registration/create.view.php");
    exit();
}


$user = $db->query("SELECT * FROM users WHERE email = :email", [
    [
        "key" => ":email",
        "value" => $email,
        "type" => PDO::PARAM_STR
    ]
])->fetch();
if ($user) {
    header("location:/login");
} else {
    $db->query("INSERT INTO users (
    id,
    name,
    surname,
    email,
    password
    ) VALUES (
    NULL,
    :name,
    :surname,
    :email,
    :password)", [
        [
            "key" => ":name",
            "value" => $name,
            "type" => PDO::PARAM_STR
        ],
        [
            "key" => ":surname",
            "value" => $surname,
            "type" => PDO::PARAM_STR
        ],
        [
            "key" => ":email",
            "value" => $email,
            "type" => PDO::PARAM_STR
        ],
        [
            "key" => ":password",
            "value" => password_hash($password, PASSWORD_BCRYPT),
            "type" => PDO::PARAM_STR
        ],
    ]);
    login($user);
    header("location:/");
    exit();
}

// dd($user);
echo "done";
