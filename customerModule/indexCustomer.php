<!--PHP script that redirects to login if not signed in-->

<?php
session_start();
if (!isset($_SESSION['userID'])) {
    header('location: loginAdmin.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Customer | Gym</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../myScripts.js"></script>

</head>

<body>

    <!--Header-->
    <div class="header">
        <h1>Welcome <?php echo $_SESSION['firstname'] . " " . $_SESSION["lastname"] . "!"; ?> </h1>

    </div>
    <hr class="border">

    <!--Menu-->
    <div class="menu-row">
        <div class="menu-column">
            <a href="manageCustomers.php" class="menu-button">My Profile</a>
        </div>
        <div class="menu-column">
            <a href="manageTrainers.php" class="menu-button">My Classes</a>
        </div>
        <div class="menu-column">
            <a href="manageClasses.php" class="menu-button">Enrol to a class</a>
        </div>
        <div class="menu-column">
            <a href="contactUs.php" class="menu-button">Contact</a>
        </div>
    </div>
</body>

</html>