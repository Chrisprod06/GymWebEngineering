<?php
$title = 'Manage Customers | Gym';
include_once '../includes/header.inc.php';
if (!isset($_SESSION['userID'])) {
    header('location: loginAdmin.php');
}
?>

<body>



    <div id="main">
        <h2 class="manageHeader">Delete Customer</h2>
        <hr class="border">

        <div class="dataFormContainer">
            <!--Form to delete customer accounts-->
         
            <form class= "addCustomerForm" action="../includes/removeCustomer.inc.php" method="POST">
                <label for="users">Choose a user:</label>
                <select name="users" id="users">
                    <option value=" "></option>
                    <!--PHP script to retrieve user ids to the list-->
                    <?php
                    include_once '../includes/dbh.inc.php';
                    $sql = "SELECT userID FROM users WHERE role=3;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value = " . $row['userID'] . ">" . $row['userID'] . "</option>";
                    }
                    ?>
                </select>
                <input  class="addCustomerFormButton" type="submit" name="submitRemoveCustomer" value="Delete customer"><br>
                
                <a style="width : 95%" href="manageCustomers.php" class="actionLinks">Cancel</a>

            </form>
        </div>

    </div>

</body>

</html>