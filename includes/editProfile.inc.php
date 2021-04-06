<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'dbh.inc.php';
    $role = $_SESSION['role'];
    $userID = (int)$_SESSION['userID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $repeatNewPassword = $_POST['repeatNewPassword'];
   


    //Error handlers
    if ($_POST['currentPassword'] != '') {
        //check if current passoword matches the one in the database


        $sql = "SELECT password FROM users WHERE userID = ?; ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            if ($role == 1) {
                header('location: ../adminModule/editProfile.php?error=stmtFailed');
            } else if ($role == 3) {
                header('location: ../customerModule/editProfile.php?error=stmtFailed');
            } else if ($role == 2) {
                header('location: ../trainerModule/editProfile.php?error=stmtFailed');
            }
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            if (password_verify($currentPassword, $row['password']) == false) {

                if ($role == 1) {
                    header('location: ../adminModule/editProfile.php?error=currentPasswordWrong');
                } else if ($role == 3) {
                    header('location: ../customerModule/editProfile.php?error=currentPasswordWrong');
                } else if ($role == 2) {
                    header('location: ../trainerModule/editProfile.php?error=currentPasswordWrong');
                }
                exit();
            }
        } else {
            if ($role == 1) {
                header('location: ../adminModule/editProfile.php?error=somethingWrong');
            } else if ($role == 3) {
                header('location: ../customerModule/editProfile.php?error=somethingWrong');
            } else if ($role == 2) {
                header('location: ../trainerModule/editProfile.php?error=somethingWrong');
            }
            exit();
        }



        //check if new password and repeat new password are the same
        if ($newPassword != $repeatNewPassword) {
            if ($role == 1) {
                header('location: ../adminModule/editProfile.php?error=passwordsDontMatch');
            } else if ($role == 3) {
                header('location: ../customerModule/editProfile.php?error=passwordsDontMatch');
            } else if ($role == 2) {
                header('location: ../trainerModule/editProfile.php?error=passwordsDontMatch');
            }
            exit();
        } else {
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password=? WHERE userID=?;";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                if ($role == 1) {
                    header('location: ../adminModule/editProfile.php?error=stmtFailed');
                } else if ($role == 3) {
                    header('location: ../customerModule/editProfile.php?error=stmtFailed');
                } else if ($role == 2) {
                    header('location: ../trainerModule/editProfile.php?error=stmtFailed');
                }
                exit();
            }
            mysqli_stmt_bind_param($stmt, "si", $hashedNewPassword, $userID);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    }


    //Update field in database
    $sql = "UPDATE users SET firstname = ? ,lastname = ?, telephone = ?, address=?,email = ?, password=? WHERE  userID = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        if ($role == 1) {
            header('location: ../adminModule/editProfile.php?error=stmtFailed');
        } else if ($role == 3) {
            header('location: ../customerModule/editProfile.php?error=stmtFailed');
        } else if ($role == 2) {
            header('location: ../trainerModule/editProfile.php?error=stmtFailed');
        }
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssisssi", $firstname, $lastname, $telephone,$address, $email, $hashedPassword, $userID);

    if (!mysqli_stmt_execute($stmt)) {
        if ($role == 1) {
            header('location: ../adminModule/editProfile.php?error=stmtFailed');
        } else if ($role == 3) {
            header('location: ../customerModule/editProfile.php?error=stmtFailed');
        } else if ($role == 2) {
            header('location: ../trainerModule/editProfile.php?error=stmtFailed');
        }
        exit();
    } else {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['telephone'] = $telephone;
        $_SESSION['email'] = $email;
        if ($role == 1) {
            header('location: ../adminModule/editProfile.php?update=successful');
        } else if ($role == 3) {
            header('location: ../customerModule/editProfile.php?update=successful');
        } else if ($role == 2) {
            header('location: ../trainerModule/editProfile.php?update=successful');
        }
        exit();
    }
}
