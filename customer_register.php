<?php
session_start();

if (isset($_POST['signup'])) {
    
    $username= $_POST['username'];
    $password= $_POST['password'];
    $file= $_POST['file'];
    $name= $_POST['name'];
    $address= $_POST['address'];

    require_once "functions3.php";


    if (usernameCheck($username) !== true) {
        header('location: customers_login.php?error=invalidUsername');
        exit();
    }

    if (usernameExists($username) !== true) {
        header('location: customers_login.php?error=usernameExisted');
        exit();
    }

    if (passwordCheck($password) !== true) {
        header('location: customers_login.php?error=invalidPassword');
        exit();
    }

    if (nameCheck($name) !== true) {
        header('location: customers_login.php?error=invalidBusinessName');
        exit();
    }

    if (addressCheck($address) !== true) {
        header('location: customers_login.php?error=invalidAddress');
        exit();
    }

    createAccount($username, $password, $name, $address);

    $_SESSION['displayName']= $username;
    $_SESSION['displayFullName']= $name;
    $_SESSION['displayAddress']= $address;

}
else {
    header('location: customers_login.php');
}