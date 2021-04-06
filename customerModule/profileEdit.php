<?php
$title = 'My profile | Gym';
include_once '../includes/header.inc.php';
if (!isset($_SESSION['userID'])) {
    header('location: loginCustomer.php');
}
?>

<body>

    <!--Navbar-->
    <?php
    include_once 'navbar.php';
    ?>

    <head>
        <title>My Profile| Gym</title>
        <link rel="stylesheet" href="../style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <div id="main">
        <h2 class="manageHeader">Update Profile!</h2>
        <hr class="border">

        <div class="dataFormContainer">

            <form class="addCustomerFoprm" action="../customerModule/profileUpdate.php" method="post">
                <label for="firstname">FirstName:</label><br>
                <input type="text" class="addCustomerFormInput" name="firstname" id="firstname"><br>
                <label for="lastname">Lastname:</label><br>
                <input type="text" class="addCustomerFormInput" name="lastname" id="lastname"><br>
                <label for="telephone">Telephone:</label><br>
                <input type="text" class="addCustomerFormInput" name="telephone" id="telephone"><br>
                <label for="address">Address:</label><br>
                <input type="text" class="addCustomerFormInput" name="address" id="address"><br>
                <label for="email">Email:</label><br>
                <input type="text" class="addCustomerFormInput" name="email" id="email"><br>
                <input type="submit" name="edit">
            </form>
        </div>

    </div>


    
    </form>
</body>

</html>