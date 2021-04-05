<?php
session_start();
if (!isset($_SESSION['userID'])) {
    header("Location: LoginTrainer.php");
}
$trainerid=$_SESSION['userID'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>My Customers | Gym</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../myScripts.js"></script>

</head>

<body>
<div id="main">
        <!--Table to present data-->
        <div class="dataTableContainer">
            <h2 class="manageHeader">Customers</h2>
            <div class="dataTable">
                <hr class="border">
                <table>
                    <tr>
                        <th>UserID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Telephone</th>
                        <th>Address</th>
                        <th>Email</th>
                    </tr>

                    <?php 

                     include_once '../includes/dbh.inc.php';
        
                            $getusers="SELECT customerID FROM enrolledclasses WHERE trainerID='$trainerid' "; 
                            $result = mysqli_query($conn, $getusers);
                            while ($row=mysqli_fetch_assoc($result)){
                                $getuserinfo='SELECT userID,firstname,lastname,telephone,address,email FROM users WHERE userID= "'.$row['customerID'].'" ';
                                $result2=mysqli_query($conn,$getuserinfo);
                                while ($row2=mysqli_fetch_assoc($result2)){
                                echo "<tr><td>" . $row2["userID"] . "</td><td>" . $row2["firstname"] . "</td><td>"
                                . $row2["lastname"] . "</td><td>" . $row2['telephone'] . "</td><td>" . $row2['address'] . "</td><td>" . $row2['email'] ;}
                            }
                            echo "</table>";

                        ?>


 </body>

 </html>                       