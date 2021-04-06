<?php
    $title = 'Home Admin | Gym'; 
    include_once '../includes/header.inc.php';
    if (!isset($_SESSION['userID'])) {
        header('location: loginAdmin.php');
    }
?>

<body>

    <!--Header-->
    <div class="header">
        <h1>Welcome <?php echo $_SESSION['firstname'] . " " . $_SESSION["lastname"] . "!"; ?> </h1>

    </div>
    <hr class="border">

    <!--Menu-->
    <div class="menu-row">
        <div class="menu-column">
            <a href="manageCustomers.php" class="menu-button">Manage Customers</a>
        </div>
        <div class="menu-column">
            <a href="manageTrainers.php" class="menu-button">Manage Trainers</a>
        </div>
        <div class="menu-column">
            <a href="manageClasses.php" class="menu-button">Classes</a>
        </div>
        <div class="menu-column">
            <a href="contactQueries.php" class="menu-button">Contact Us Queries</a>
        </div>
    </div>
</body>

</html>