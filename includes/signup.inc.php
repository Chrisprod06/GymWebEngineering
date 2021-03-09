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
        $role = 3;
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
        if($role == 1){
            header('location: ../adminModule/registerAdmin.php?error=invalidemail');
        }else if ($role == 3){
            header('location: ../customerModule/registerCustomer.php?error=invalidemail');
        }else if ($role == 2){
            header('location: ../trainerModule/registerTrainer.php?error=invalidemail');
        }
        
        exit();
    }

    if (pwdMatch($password, $rePassword) !== false) {
        if($role == 1){
            header('location: ../adminModule/registerAdmin.php?error=invalidemail');
        }else if ($role == 3){
            header('location: ../customerModule/registerCustomer.php?error=invalidemail');
        }else if ($role == 2){
            header('location: ../trainerModule/registerTrainer.php?error=invalidemail');
        }
        exit();
    }
    if (emailExists($conn, $email,$role) !== false) {
        if($role == 1){
            header('location: ../adminModule/registerAdmin.php?error=emailExists');
        }else if ($role == 3){
            header('location: ../customerModule/registerCustomer.php?error=emailExists');
        }else if ($role == 2){
            header('location: ../trainerModule/registerTrainer.php?error=emailExists');
        }
        exit();
    }

    //add user to database
    createUser($conn, $firstname, $lastname, $telephone, $address, $email, $password, $role);
} else {
    if($role == 1){
        header('location: ../adminModule/registerAdmin.php');
    }else if ($role == 3){
        header('location: ../customerModule/registerCustomer.php');
    }else if ($role == 2){
        header('location: ../trainerModule/registerTrainer.php');
    }
    
    exit();
}
