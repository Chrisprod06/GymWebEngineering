<?php
 
 session_start();
 include "config.php";
 if(isset($_POST['edit']))
 {
    $id=$_SESSION['userID'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $telephone=$_POST['telephone'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $select= "select * from users where userID='$userID'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['userID'];
    if($res === $userID)
    {
   
       $update = "update users set firstname='$firstname',lastname='$lastname',telephone='$telephone',address='$address',email='$email' where userID='$userID'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           /*Successful*/
           header('location:indexCustomers.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:profileEdit.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:profileEdit.php');
    }
 }
?>