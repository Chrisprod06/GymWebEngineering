<?php
$title = 'Home | Gym';
include_once 'includes/header.inc.php';
?>

<body>

    <!--Header-->
    <div class="header">
        <h1>Welcome to ELIT3 fitness center!</h1>
        <h2>Select your role to continue.</h2>

    </div>
    <hr class="border">
    <!--Menu-->

    <div class="menu-row">
        <div class="menu-column" style="width:33.33%">
            <a href="adminModule/loginAdmin.php"><img alt="admin" src="img/admin.png">
            <a href="adminModule/loginAdmin.php" class = "menu-button">Admin</a>

          </a>
        </div>
        <div class="menu-column" style="width:33.33%">
<<<<<<< Updated upstream
            <a href="customerModule/loginCustomer.php"> <img alt="admin" src="img/customer.png"></a>
            <a href="customerModule/loginCustomer.php" class = "menu-button">Customer</a>
            
=======
            <a href="customerModule/loginCustomer.php" class="menu-button">Customer</a>
>>>>>>> Stashed changes
        </div>
        <div class="menu-column" style="width:33.33%">
            <a href="trainerModule/loginTrainer.php"> <img alt="admin" src="img/trainer.png"></a>
            <a href="trainerModule/loginTrainer.php" class = "menu-button">Trainer</a>
        </div>
    </div>
</body>

</html>