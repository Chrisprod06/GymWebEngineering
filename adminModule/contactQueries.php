
<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header('location: loginAdmin.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contact Queries | Gym</title>
        <link rel="stylesheet" href="../style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../myScripts.js"></script>
        
    </head>
    <body>

<?php
        include_once 'navbar.php';
    ?>

    <div id="main">

    </div>
        
    </body>
</html>