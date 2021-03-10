<?php

if (isset($_POST['submitLoginAdmin']) || isset($_POST['submitLoginCustomer']) || isset($_POST['submitLoginTrainer'])) {

    $email = $_POST['email'];
    $password = $_POST['pass'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (isset($_POST['submitLoginAdmin'])) {
        $role = 1;
    } else if (isset($_POST['submitLoginTrainer'])) {
        $role = 2;
    } else if (isset($_POST['submitLoginCustomer'])) {
        $role = 3;
    }


    //error handlers
    if (emptyInputLogin($email, $password, $role) !== false) {
        if ($role == 1) {
            header('location: ../adminModule/loginAdmin.php?error=emptyinput');
        } else if ($role == 3) {
            header('location: ../customerModule/loginCustomer.php?error=emptyinput');
        } else if ($role == 2) {
            header('location: ../trainerModule/loginTrainer.php?error=emptyinput');
        }

        exit();
    }
    if (invalidEmail($email, $role) !== false) {
        if ($role == 1) {
            header('location: ../adminModule/loginAdmin.php?error=invalidemail');
        } else if ($role == 3) {
            header('location: ../customerModule/loginCustomer.php?error=invalidemail');
        } else if ($role == 2) {
            header('location: ../trainerModule/loginTrainer.php?error=invalidemail');
        }
        exit();
    }

    loginUser($conn, $email, $password, $role);
} else {
    header('location: ../index.php');
    

    exit();
}
