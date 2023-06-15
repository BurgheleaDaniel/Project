<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/project/vendor/autoload.php');

include_once "RestController.php";
include_once "AuthController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

$requestMethod = $_SERVER["REQUEST_METHOD"];

$authController = new AuthController($requestMethod);

var_dump($_GET);
var_dump($_REQUEST);

switch ($uri[2]) {
    case 'LoginPage':
        $username = $_POST['username'];
        $password = $_POST['password'];

        $authController->processRequest($_POST['username'], $_POST['password']);

        //header('Location: /project/HomePage/HomePage.html');

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
