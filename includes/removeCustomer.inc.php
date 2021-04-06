<?php

if (isset($_POST['submitRemoveCustomer'])) {
    $userID = $_POST['users'];

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';


    //error handlers
    removeCustomer($conn, $userID);

} else {
    header("location: ../adminModule/manageCustomers.php");
}
