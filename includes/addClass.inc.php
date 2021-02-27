<?php


if (isset($_POST['submitAddClass']) ){


    $classID = $_POST['classID'];
    $className = $_POST['className'];
    $day = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $trainerID = $_POST['trainerID'];

    include_once '../includes/functions.inc.php';
    include_once '../includes/dbh.inc.php';


    //error handlers
   

   //Function to add class
   addClass($conn,$classID,$className,$day,$startTime,$endTime,$trainerID);


}else{
    header('Location: ../adminModule/manageClasses.php');
    exit();
}