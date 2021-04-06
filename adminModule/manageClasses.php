<?php
$title = 'Manage Classes | Gym';
include_once '../includes/header.inc.php';
if (!isset($_SESSION['userID'])) {
    header('location: loginAdmin.php');
}
?>

<body>


    <?php
    include_once 'navbar.php';
    ?>

    <div id="main">
        <div class="dataTableContainer">
            <h2 class="manageHeader">Classes</h2>
            <div class="dataTable">
                <hr class="border">
                <table>
                    <tr>
                        <th>ClassID</th>
                        <th>Class Name</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Role</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Telephone</th>
                        <th>Email</th>
                    </tr>

                    <!--PHP script to load data from  table-->
                    <?php

                    include_once '../includes/dbh.inc.php';
                    //sql query not working
                    $sql = "SELECT * FROM  users NATURAL JOIN enrolledclasses NATURAL JOIN classes where role=2 or role=3; ";
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

                            echo "<tr><td>" . $row["classID"] . "</td><td>" . $row["className"] . "</td><td>"
                                . $row["day"] . "</td><td>" . $row['startTime'] . "</td><td>" . $row['endTime'] . "</td><td>" . $role . "</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['telephone'] . "</td><td>" . $row['email'] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No results.";
                    }

                    ?>
                </table>
            </div>
            <div class="actionsContainer">
                <a href="addClass.php" class="actionButtons">Add Class</a>
            </div>
        </div>


    </div>

</body>

</html>