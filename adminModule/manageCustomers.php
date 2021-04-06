<?php
$title = 'Manage Customers | Gym';
include_once '../includes/header.inc.php';
if (!isset($_SESSION['userID'])) {
    header('location: loginAdmin.php');
}
?>

<body>

    <!--Navbar-->
    <?php
    include_once 'navbar.php';
    ?>

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
                        <th>Role</th>
                    </tr>

                    <!--PHP script to load data from users table-->
                    <?php

                    include_once '../includes/dbh.inc.php';

                    $sql = "SELECT userID, firstname, lastname, telephone, address ,email, role FROM users WHERE role=3; ";
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

                            echo "<tr><td>" . $row["userID"] . "</td><td>" . $row["firstname"] . "</td><td>"
                                . $row["lastname"] . "</td><td>" . $row['telephone'] . "</td><td>" . $row['address'] . "</td><td>" . $row['email'] . "</td><td>" . $role . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No results.";
                    }

                    ?>
                </table>
            </div>
            <div class="actionsContainer">
                <a href="addCustomer.php" class="actionButtons">Add Customer</a>
                <a href="deleteCustomer.php" class="actionButtons">Delete Customer</a>
            </div>

        </div>

    </div>

</body>

</html>