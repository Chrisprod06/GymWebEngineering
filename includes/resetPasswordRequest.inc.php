<?php

if(isset($_POST['submit'])){

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "www.gymElit3.net/createNewPassword.php?selector=".$selector. "&validator = ".bin2hex($token);

    $expires = date("U")+1800;

    require_once 'dbh.inc.php';

    

}
else{
    header('location: ../resetPassword.php');
    exit();
}