<?php
session_start();

if (isset($_POST['signup'])) {
    
    $username= $_POST['username'];
    $password= $_POST['password'];
    $file= $_POST['file'];
    $businessname= $_POST['businessname'];
    $address= $_POST['address'];

    require_once "functions.php";


    if (usernameCheck($username) !== true) {
        header('location: vendors_login.php?error=invalidUsername');
        exit();
    }

    if (usernameExists($username) !== true) {
        header('location: vendors_login.php?error=usernameExisted');
        exit();
    }

    if (passwordCheck($password) !== true) {
        header('location: vendors_login.php?error=invalidPassword');
        exit();
    }

    if (businessnameCheck($businessname) !== true) {
        header('location: vendors_login.php?error=invalidBusinessName');
        exit();
    }

    if (addressCheck($address) !== true) {
        header('location: vendors_login.php?error=invalidAddress');
        exit();
    }

    createAccount($username, $password, $businessname, $address);

    $_SESSION['displayName']= $username;
    $_SESSION['displayBusinessName']= $businessname;
    $_SESSION['displayAddress']= $address;

}
else {
    header('location: vendors_login.php');
}