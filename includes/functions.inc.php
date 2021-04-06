<?php

//function for checking empty fields
function emptyInputSignup($firstname, $lastname, $telephone, $address, $email, $password, $rePassword)
{
    $result = false;
    if (empty($firstname) || empty($lastname) || empty($telephone) || empty($address) || empty($email) || empty($password) || empty($rePassword)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//function for checking correct email
function invalidEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

//function for checking if passwords are matching
function pwdMatch($password, $rePassword)
{
    $result = false;
    if ($password !== $rePassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//function if email is submitted
function emailExists($conn, $email,$role,$calling)
{
    $sql = 'SELECT * FROM users WHERE email = ?;';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        if($calling = 1){
            if($role == 1){
                header('location: ../adminModule/registerAdmin.php?error=stmtfailed');
            }else if ($role == 3){
                header('location: ../customerModule/registerCustomer.php?error=stmtfailed');
            }else if ($role == 2){
                header('location: ../trainerModule/registerTrainer.php?error=stmtfailed');
            }
        }else if ($calling = 2){
            if($role == 1){
                header('location: ../adminModule/loginAdmin.php?error=stmtfailed');
            }else if ($role == 3){
                header('location: ../customerModule/loginCustomer.php?error=stmtfailed');
            }else if ($role == 2){
                header('location: ../trainerModule/loginTrainer.php?error=stmtfailed');
            }
        }
        
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}
//function to create new user
function createUser($conn, $firstname, $lastname, $telephone, $address, $email, $password, $role)
{
    $sql = 'INSERT INTO users (firstname, lastname, telephone, address, email, password, role ) VALUES (?,?,?,?,?,?,?);';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        if($role == 1){
            header('location: ../adminModule/registerAdmin.php?error=stmtfailed');
        }else if ($role == 3){
            header('location: ../customerModule/registerCustomer.php?error=stmtfailed');
        }else if ($role == 2){
            header('location: ../trainerModule/registerTrainer.php?error=stmtfailed');
        }
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssisssi", $firstname, $lastname, $telephone, $address, $email, $hashedPassword, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($role == 1){
        header('location: ../adminModule/registerAdmin.php?error=none');
    }else if ($role == 3){
        header('location: ../customerModule/registerCustomer.php?error=none');
    }else if ($role == 2){
        header('location: ../trainerModule/registerTrainer.php?error=none');
    }
    exit();
}

//empty input login
function emptyInputLogin($email, $password)
{
    $result = false;
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//function to login user
function loginUser($conn, $email, $password,$role)
{

    $uidExists = emailExists($conn, $email,$role,2);

    if ($uidExists === false) {
        if($role == 1){
            header('location: ../adminModule/registerAdmin.php?error=wronglogin');
        }else if ($role == 3){
            header('location: ../customerModule/registerCustomer.php?error=wronglogin');
        }else if ($role == 2){
            header('location: ../trainerModule/registerTrainer.php?error=wronglogin');
        }
        exit();
    }

    $passwordHashed = $uidExists['password'];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false) {
        if($role == 1){
            header('location: ../adminModule/loginAdmin.php?error=wrongpassword');
        }else if ($role == 3){
            header('location: ../customerModule/loginCustomer.php?error=wrongpassword');
        }else if ($role == 2){
            header('location: ../trainerModule/loginTrainer.php?error=wrongpassword');
        }
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION['role'] = $uidExists['role'];
        $_SESSION['userID'] = $uidExists['userID'];
        $_SESSION['email']=$uidExists['email'];
        $_SESSION['address'] = $uidExists['address'];
        $_SESSION['telephone'] = $uidExists['telephone'];
        $_SESSION['firstname'] = $uidExists['firstname'];
        $_SESSION['lastname'] = $uidExists['lastname'];
        if ($uidExists['role'] == 1) {
            header('location: ../adminModule/indexAdmin.php');
            exit();
        } else if ($uidExists['role'] == 2) {
            header('location: ../trainerModule/indexTrainer.php');
            exit();
        } else if ($uidExists['role'] == 3) {
            header('location: ../customerModule/indexCustomers.php');
            exit();
        }
    }
}

//function to create a random password
function generatePassword()
{

    $passLength = 10;
    $symbols = '~!@#$*%`?[]{};<>?.,_-()';
    $symbolsCounter = strlen($symbols);
    $randomPosition = mt_rand(0, $symbolsCounter - 1);

    $password = substr($symbols, $randomPosition, 1);
    $password = chr(mt_rand(48, 57));
    $password = chr(mt_rand(65, 90));

    while (strlen($password) < $passLength) {
        $password = chr(mt_rand(97, 122));
    }

    $password = str_shuffle($password);
    return $password;
}

//function to check if add customer form fields are empty
function emptyAddCustomer($firstname, $lastname, $telephone, $address, $email)
{
    $result = null;

    if (empty($firstname) || empty($lastname) || empty($telephone) || empty($address) || empty($email)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

//function to add customer
function addCustomer($conn, $firstname, $lastname, $telephone, $address, $email, $password, $role)
{
    $sql = 'INSERT INTO users (firstname, lastname, telephone, address, email, password, role ) VALUES (?,?,?,?,?,?,?);';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../adminModule/manageCustomers.php?error=stmtfailed');
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssisssi", $firstname, $lastname, $telephone, $address, $email, $hashedPassword, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../adminModule/manageCustomers.php?error=none');
    exit();
}

function removeCustomer($conn, $userID)
{
    $sql = 'DELETE FROM users WHERE userID = ?';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../adminModule/manageCustomers.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../adminModule/manageCustomers.php?error=none');
    exit();
}


//function to add class
function addClass($conn, $classID, $className, $day, $startTime, $endTime, $trainerID)
{

    $sql = 'INSERT INTO classes VALUES (?,?,?,?,?,?);';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../adminModule/manageClasses.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'sssssi', $classID, $className, $day, $startTime, $endTime, $trainerID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../adminModule/manageClasses.php?error=none');
    exit();
}
