<?php
$title = 'Manage Customers | Gym';
include_once '../includes/header.inc.php';
if (!isset($_SESSION['userID'])) {
    header('location: loginAdmin.php');
}
?>

<body>



    <div id="main">
        <h2 class="manageHeader">Add Class</h2>
        <hr class="border">

        <div class="dataFormContainer">
            <!--Form to add classes-->

            <form class="addCustomerForm" action="../includes/addClass.inc.php" method="POST">
                <label for="classID">Class ID:</label><br>
                <input class="addCustomerFormInput" type="text" name="classID"></input><br>
                <label for="className">Class Name:</label><br>
                <input class="addCustomerFormInput" type="text" name="className"></input><br>
                <label for="day">Day:</label>
                <select class="addCustomerFormInput" name="day" id="day">
                    <option value="null"></option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select><br>
                <label for="startTime">Start Time:</label><br>
                <input class="addCustomerFormInput" type="time" name="startTime"></input><br>
                <label for="endTime">End Time:</label><br>
                <input class="addCustomerFormInput" type="time" name="endTime"></input><br>
                <label for="email">Trainer ID:</label><br>
                <select class="addCustomerFormInput" name="trainerID" id="trainerID">
                    <option value="null"></option>
                    <!--PHP script to get trainers from database-->
                    <?php
                    include_once '../includes/dbh.inc.php';
                    $sql = "SELECT userID, firstname, lastname FROM users WHERE role=2;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value = " . $row['userID'] . ">" . $row['userID'] . "," . $row['firstname'] . " " . $row['lastname'] . "</option>";
                    }
                    ?>
                </select>
                <input class="addCustomerFormButton" type="submit" name="submitAddClass" value="Add class"><br>
            </form>
        </div>

    </div>

</body>

</html>