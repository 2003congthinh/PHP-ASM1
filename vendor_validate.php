<?php

if (isset($_POST["signin"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'functions.php';

    if (emptySignin($username, $password) !== true) {
        header('location: vendors_login.php?error=empty');
        exit();
    }
    
    if (usernameLogin($username) !== true) {
        header('location: vendors_login.php?error=invalidUsernameLogin');
        exit();
    }

    if (passwordLogin($username, $password) !== true) {
        header('location: vendors_login.php?error=invalidPasswordLogin');
        exit();
    }


    header('location: vendor_my_account.php');
}
else {
    header('location: vendors_login.php');
}