<?php
session_start();

if (isset($_POST['signup'])) {
    
    $username= $_POST['username'];
    $password= $_POST['password'];
    $file= $_POST['file'];
    $hub= $_POST['hub'];

    require_once "functions2.php";


    if (usernameCheck($username) !== true) {
        header('location: shippers_login.php?error=invalidUsername');
        exit();
    }

    if (usernameExists($username) !== true) {
        header('location: shippers_login.php?error=usernameExisted');
        exit();
    }

    if (passwordCheck($password) !== true) {
        header('location: shippers_login.php?error=invalidPassword');
        exit();
    }

    createAccount($username, $password, $hub);

    $_SESSION['displayName']= $username;
    $_SESSION['displayHub']= $hub;

}
else {
    header('location: shippers_login.php');
}