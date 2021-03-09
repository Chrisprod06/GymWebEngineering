<?php

if (isset($_POST['submitRemoveCustomer'])) {
    $userID = $_POST['users'];

    include_once '../includes/dbh.inc.php';
    include_once '../includes/functions.inc.php';


    //error handlers


    removeCustomer($conn, $userID);
} else {
    header("location: ../adminModule/manageCustomers.php");
}
