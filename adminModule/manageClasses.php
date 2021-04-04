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
                    </tr>

                    <!--PHP script to load data from  table-->
                    <?php

                    include_once '../includes/dbh.inc.php';
                    //sql query not working
                    $sql = "SELECT classID,className,day,startTime,endTime,role,firstname,lastname,telephone,email, FROM users NATURAL JOIN classes; ";
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
        </div>

       
    </div>

</body>

</html>