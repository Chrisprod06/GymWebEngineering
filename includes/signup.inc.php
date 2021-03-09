<?php

//check if user uses this script using the submit button else send them back
if (isset($_POST['submitCreateAdmin']) || isset($_POST['submitCreateCustomer']) || isset($_POST['submitCreateTrainer'])) {

    //get data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $rePassword = $_POST['rePass'];

    if (isset($_POST['submitCreateAdmin'])) {
        $role = 1;
    } else if (isset($_POST['submitCreateTrainer'])) {
        $role = 2;
    } else if (isset($_POST['submitCreateCustomer'])) {
        $role = 2;
    }



    //requires
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //error handlers
    if (emptyInputSignup($firstname, $lastname, $telephone, $address, $email, $password, $rePassword) !== false) {
        header('location: ../adminModule/registerAdmin.php?error=emptyinput');
        exit();
    }
    //need to create telephone function validation

    if (invalidEmail($email) !== false) {
        header('location: ../adminModule/registerAdmin.php?error=invalidemail');
        exit();
    }

    if (pwdMatch($password, $rePassword) !== false) {
        header('location: ../adminModule/registerAdmin.php?error=passworddontmatch');
        exit();
    }
    if (emailExists($conn, $email) !== false) {
        header('location: ../adminModule/registerAdmin.php?error=emailExists');
        exit();
    }

    //add user to database
    createUser($conn, $firstname, $lastname, $telephone, $address, $email, $password, $role);
} else {
    header('location: ../adminModule/registerAdmin.php');
    exit();
}
