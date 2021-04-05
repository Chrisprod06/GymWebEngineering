<?php
$title = 'Home Trainer | Gym'; 
include_once '../includes/header.inc.php';
if (!isset($_SESSION['userID'])) {
    header('location: loginTrainer.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Trainer | Gym</title>
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
            <a href="Customers.php" class="menu-button">My Customers</a>
        </div>
        <div class="menu-column">
            <a href="Classes.php" class="menu-button">Classes</a>
        </div>

    </div>
</body>

</html>