<?php
 
 session_start();
 include "config.php";
 if(isset($_POST['edit']))
 {
    $id=$_SESSION['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $telephone=$_POST['telephone'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $select= "select * from users where id='$id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];
    if($res === $id)
    {
   
       $update = "update users set firstname='$firstname',lastname='$lastname',telephone='$telephone',address='$address',email='$email' where id='$id'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           /*Successful*/
           header('location:indexCustomers.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:Profile_edit_form.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:Profile_edit_form.php');
    }
 }
?>