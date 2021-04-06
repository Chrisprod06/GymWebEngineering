<?php
    $title = 'Contact Us! | Gym'; 
    include_once '../includes/header.inc.php';
    if (!isset($_SESSION['userID'])) {
        header('location: loginCustomer.php');
    }
?>

<body>

    <?php
    include_once 'navbar.php';
    ?>




<!DOCTYPE html>
<html>
<head>
    <title>Contact Us!| Gym</title>
    <link rel="contactUs" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>






    <div id="main">
        <h2 class="manageHeader">Contact Us!</h2>
        <hr class="border">

        <div class="dataFormContainer">
           

            <form class="addCustomerForm" action="../customerModule/pro.php" method="POST">
                <label for="name">Name:</label><br>
                <input class="addCustomerFormInput" type="text" name="name" required></input><br>
                <label for="email">Email:</label><br>
                <input class="addCustomerFormInput" type="text" name="email" required></input><br>
                <label for="message">Message:</label><br>
                <input class="addCustomerFormInput" type="text" name="message" required></input><br>
                <input class="addCustomerFormButton" type="submit" name="submitAddClass" value="Submit"><br>
            </form>
        </div>

    </div>

</body>

</html>