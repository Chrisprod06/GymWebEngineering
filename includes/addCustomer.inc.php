<?php


if (isset($_POST['submitAddCustomer'])) {
    include_once '../includes/functions.inc.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = "abc123";
    $role = 3;

    include_once '../includes/dbh.inc.php';


    //error handlers
    if (emailExists($conn, $email,$role,1) == true) {
        header('Location: ../adminModule/manageCustomers.php?error=userAlreadyExists');
        exit();
    }

    if (emptyAddCustomer($firstname, $lastname, $telephone, $address, $email) == true) {
        header('Location: ../adminModule/manageCustomers.php?error=emptyAddCustomerInput');
        exit();
    }

    addCustomer($conn, $firstname, $lastname, $telephone, $address, $email, $password, $role);
} else {
    header('Location: ../adminModule/manageCustomers.php');
    exit();
}
