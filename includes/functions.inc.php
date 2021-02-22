<?php

//function for checking empty fields
function emptyInputSignup($firstname, $lastname, $telephone,$address,$email, $password, $rePassword){
    $result=false;
    if( empty($firstname)|| empty($lastname) || empty($telephone) ||empty($address) || empty($email) || empty($password) || empty($rePassword)){
        $result = true;

    }
    else{
        $result = false;
    }
    return $result;
}

//function for checking correct email
function invalidEmail($email){
    $result=false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

//function for checking if passwords are matching
function pwdMatch($password,$rePassword){
    $result=false;
    if($password!==$rePassword){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//function if email is submitted
function emailExists($conn,$email){
    $sql = 'SELECT * FROM users WHERE email = ?;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location: ../adminModule/registerAdmin.php?error=stmtfailed');
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

    

}
//function to create new user
function createUser($conn,$firstname,$lastname,$telephone,$address,$email,$password,$role){
    $sql = 'INSERT INTO users (firstname, lastname, telephone, address, email, password, role ) VALUES (?,?,?,?,?,?,?);';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location: ../adminModule/registerAdmin.php?error=stmtfailed');
        exit();
    }
    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt,"ssisssi",$firstname, $lastname,$telephone, $address, $email, $hashedPassword, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../adminModule/registerAdmin.php?error=none');
    exit();
}

//empty input login
function emptyInputLogin($email, $password){
    $result=false;
    if( empty($email) || empty($password)){
        $result = true;

    }
    else{
        $result = false;
    }
    return $result;
}

//function to login user
 function loginUser($conn,$email,$password){

    $uidExists = emailExists($conn, $email);

    if($uidExists === false){
        header('location: ../adminModule/registerAdmin.php?error=wronglogin');
        exit();
    }

    $passwordHashed = $uidExists['password'];
    $checkPassword = password_verify($password,$passwordHashed);

    if($checkPassword === false){
        header('location: ../adminModule/loginAdmin.php?error=wrongpassword');
        exit();
    }
    else if($checkPassword === true){
        session_start();
        $_SESSION['userID'] = $uidExists['userID'];
        $_SESSION['firstname'] = $uidExists['firstname'];
        $_SESSION['lastname'] = $uidExists['lastname'];
        header('location: ../adminModule/indexAdmin.php');
        exit();

    }


}

