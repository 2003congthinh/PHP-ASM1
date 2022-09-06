<?php

function usernameCheck($username) {
    $usernamePattern="/^[A-Za-z][^0-9]{7,15}$/"; 
    if (preg_match($usernamePattern, $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function usernameExists($username) {
    $searchfor='Username: ' . $username;
    $account = file_get_contents('accounts.db');
    if (preg_match("/$searchfor/", $account)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}

function passwordCheck($password) {
    $passwordPattern='/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&*])(\S){8,16}$/';
    if (preg_match($passwordPattern, $password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function nameCheck($name) {
    $textPattern='/^[\s\S][\w\W][\d\D]{3,}$/';
    if (preg_match($textPattern, $name)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function addressCheck($address) {
    $textPattern='/^[\s\S][\w\W][\d\D]{3,}$/';
    if (preg_match($textPattern, $address)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function createAccount($username, $password, $name, $address) {
    $passhash = password_hash($password, PASSWORD_DEFAULT);
    file_put_contents('accounts.db', 'Username: ' . $username ."\n", LOCK_EX | FILE_APPEND);
    file_put_contents('accounts.db', 'Password: ' . $passhash ."\n", LOCK_EX | FILE_APPEND);
    file_put_contents('accounts.db', 'Name: ' . $name ."\n", LOCK_EX | FILE_APPEND);
    file_put_contents('accounts.db', 'Address: ' . $address ."\n", LOCK_EX | FILE_APPEND);
    header('location: customers_login.php?error=created');
}

function emptySignin($username, $password) {
    if (empty($username) || empty($password)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}

function usernameLogin($username) {
    $searchfor='Username: ' . $username;
    $account = file_get_contents('accounts.db');
    if (preg_match("/$searchfor/", $account)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passwordLogin($username, $password) {
    $file = file_get_contents('accounts.db');
    $accountArray = explode("\n", $file);
    $account = implode(" ", $accountArray);
    $hashedPassword = array();
    $checkUser ="/(?<=Username: $username Password: )(.*?)(?= Name)/";
    preg_match($checkUser, $account, $hashedPassword);

    if (password_verify($password, $hashedPassword[1])) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
