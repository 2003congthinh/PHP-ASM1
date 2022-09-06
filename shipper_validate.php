<?php

if (isset($_POST["signin"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'functions2.php';

    if (emptySignin($username, $password) !== true) {
        header('location: shippers_login.php?error=empty');
        exit();
    }
    
    if (usernameLogin($username) !== true) {
        header('location: shippers_login.php?error=invalidUsernameLogin');
        exit();
    }

    if (passwordLogin($username, $password) !== true) {
        header('location: shippers_login.php?error=invalidPasswordLogin');
        exit();
    }


    header('location: shipper_my_account.php');
}
else {
    header('location: shippers_login.php');
}