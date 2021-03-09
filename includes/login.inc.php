<?php

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['pass'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //error handlers
    if (emptyInputLogin($email, $password) !== false) {
        header('location: ../adminModule/loginAdmin.php?error=emptyinput');
        exit();
    }
    if (invalidEmail($email) !== false) {
        header('location: ../adminModule/loginAdmin.php?error=invalidemail');
        exit();
    }

    loginUser($conn, $email, $password,$role);
} else {
    header('location: ../adminModule/loginAdmin.php');

    exit();
}
