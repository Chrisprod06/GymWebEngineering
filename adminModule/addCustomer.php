<?php
$title = 'Add Customer | Gym';
include_once '../includes/header.inc.php';
if (!isset($_SESSION['userID'])) {
    header('location: loginAdmin.php');
}
?>

<body>



    <div id="main">
        <h2 class="manageHeader">Add Customer</h2>
        <hr class="border">

        <div class="dataFormContainer">
            <!--Form to add customer accounts-->

            <div>

            </div>
            <form class="addCustomerForm" action="../includes/addCustomer.inc.php" method="POST">
                <label for="firstname">Firstname:</label><br>
                <input class="addCustomerFormInput" type="text" name="firstname"></input><br>
                <label for="lastname">Lastname:</label><br>
                <input class="addCustomerFormInput" type="text" name="lastname"></input><br>
                <label for="telephone">Telephone:</label><br>
                <input class="addCustomerFormInput" type="int" name="telephone"></input><br>
                <label for="address">Address:</label><br>
                <input class="addCustomerFormInput" type="int" name="address"></input><br>
                <label for="email">Email:</label><br>
                <input class="addCustomerFormInput" type="email" name="email"></input><br>
                <input class="addCustomerFormButton" type="submit" name="submitAddCustomer" value="Add customer"><br>

                <a  href="manageCustomers.php" class="actionLinks">Cancel</a>

            </form>

        </div>

    </div>

</body>

</html>