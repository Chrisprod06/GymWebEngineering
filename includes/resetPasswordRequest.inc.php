<?php

if(isset($_POST['submit'])){

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "localhost/GymWebEngineering/createNewPassword.php?selector=".$selector. "&validator = ".bin2hex($token);

    $expires = date("U")+1800;

    require_once 'dbh.inc.php';
    
    $userEmail = $_POST['email'];

    //Delete email if it already exists in database so that we dont have multiple matches with emails and tokens for one user
    $sql = "DELETE FROM passwordreset WHERE passwordResetEmail = ?; ";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_prepare($stmt,$sql)){
        header("Location:../resetPasswordRequest.php?error=stmtFailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s",$userEmail);
        mysqli_stmt_execute($stmt);
        
    }
    //Insert password request 
    $sql = "INSERT INTO passwordReset(passwordResetEmail, passwordResetSelector, passwordResetToken, passwordResetExpires) VALUES(?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);   

    if(!mysqli_prepare($stmt,$sql)){
        header("Location:../resetPasswordRequest.php?error=stmtFailed");
        exit();
    }else{
        $hashedToken = password_hash($token,PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss",$userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
        
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    //Sending the email
    
    $to = $userEmail;

    $subject = 'Reset your password for Elit3 Website';

    $message = '<p>We have recieved your password reset request. Please click on the link below in order to reset your password. If you have not made 
    a request you can just ignore this email.</p>';
    $message .= '<p>The password reset link: </br>';
    $message .= '<a href"'.$url. '">'.$url.'</a></p>';

    $headers = "From: Elit3 <elit3@gmail.com>\r\n";
    $headers .= "Reply-To: elit3@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);
    
    header("Location: ../adminModule/loginAdmin.php?reset=success");
    exit();
}
else{
    header('location: ../resetPassword.php');
    
}