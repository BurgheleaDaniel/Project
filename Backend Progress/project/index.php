<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

include_once "RestController.php";
include_once "AuthController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

$requestMethod = $_SERVER["REQUEST_METHOD"];
$authController = new AuthController($requestMethod);

switch ($uri[1]) {
    case 'login':
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $jwt = $authController->processRequest($_POST['username'], $_POST['password']);
            echo $jwt['body'] ?? "";
        }
        break;

    case 'playGame':
        echo "play the game";
        break;

    default:

        //header('Location: /project/LoginPage/LoginPage.html');
        exit();
}

////verify if the username and the password are correct

//
//$validUsername = 'admin';
//$validPassword = 'pass';
//
//if ($username === $validUsername && $password === $validPassword) {
//    // Redirect the user to the home page if the username and password are correct
//    header('Location: ../HomePage/HomePage.html');
//    exit;
//} else {
//    // Username or password is incorrect, show an error message
//    echo 'Invalid username or password. Please try again.';
//}
