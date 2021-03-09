<?php
session_start();
if (!isset($_SESSION['userID'])) {
    header('location: loginAdmin.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Queries | Gym</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../myScripts.js"></script>

</head>

<body>

    <?php
    include_once 'navbar.php';
    ?>

    <div id="main">
        <div class="dataTableContainer">
            <h2 class="manageHeader">Contact Queries</h2>
            <div class="dataTable">
                <hr class="border">
                <table>
                    <tr>
                        <th>ContactID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Role</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>

                    <!--PHP script to load data from users table-->
                    <?php

                    include_once '../includes/dbh.inc.php';

                    $sql = "SELECT contactID,firstname,lastname,email,telephone,subject,message,role FROM users natural join contactqueries; ";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            if ($row['role'] == 1) {
                                $role = 'Admin';
                            } else if ($row['role'] == 2) {
                                $role = 'Trainer';
                            } else if ($row['role'] == 3) {
                                $role = 'Customer';
                            }

                            echo "<tr><td>" . $row["contactID"] . "</td><td>" . $row["firstname"] . "</td><td>"
                                . $row["lastname"] . "</td><td>" . $row['telephone'] . "</td><td>" . $row['email'] . "</td><td>" . $role . "</td><td>" . $role . "</td><td>" . $row['subject'] . "</td><td>" . $row['message'] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No results.";
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>