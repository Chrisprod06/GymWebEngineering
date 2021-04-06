<?php
$title = 'Edit Profile | Gym';
include_once '../includes/header.inc.php';
if (!isset($_SESSION['userID'])) {
    header('location: loginAdmin.php');
}
?>

<body>



    <div id="main">
        <h2 class="manageHeader">Edit Profile</h2>
        

        <div class="dataFormContainer">
            <!--Form to add customer accounts-->

            <div>

            </div>
            <form class="addCustomerForm" action="../includes/editProfile.inc.php" method="POST">
                <label for="firstname">Firstname:</label><br>
                <input class="addCustomerFormInput" type="text" name="firstname" value = "<?php echo $_SESSION['firstname']?>"></input><br>
                <label for="lastname">Lastname:</label><br>
                <input class="addCustomerFormInput" type="text" name="lastname" value = "<?php echo $_SESSION['lastname']?>"></input><br>
                <label for="telephone">Telephone:</label><br>
                <input class="addCustomerFormInput" type="int" name="telephone" value = "<?php echo $_SESSION['telephone']?>"></input><br>
                <label for="address">Address:</label><br>
                <input class="addCustomerFormInput" type="int" name="address" value = "<?php echo $_SESSION['address']?>"></input><br>
                <label for="email">Email:</label><br>
                <input class="addCustomerFormInput" type="email" name="email" value = "<?php echo $_SESSION['email']?>"></input><br>
                <label for="currentPassword">Current Password:</label><br>
                <input class="addCustomerFormInput" type="password" name="currentPassword"></input><br>
                <label for="newPassword">New Password:</label><br>
                <input class="addCustomerFormInput" type="password" name="newPassword"></input><br>
                <label for="repeatNewPassword">Repeat New Password:</label><br>
                <input class="addCustomerFormInput" type="password" name="repeatNewPassword"></input><br>

                <input class="addCustomerFormButton" type="submit" name="submit" value="Save Changes"><br>

                <a  href="indexAdmin.php" class="actionLinks">Cancel</a>

            </form>

        </div>

    </div>

</body>

</html>