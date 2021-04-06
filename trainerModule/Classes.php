<?php
session_start();
if (!isset($_SESSION['userID'])) {
    header("Location: LoginTrainer.php");
}
$trainerid=$_SESSION['userID'];
?>

<head>
    <title>My Classes | Gym</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../myScripts.js"></script>

</head>

<body>


<?php
    include_once 'navbarTrainer.php';
?>

<div id="main">
        <!--Table to present data-->
        <div class="dataTableContainer">
            <h2 class="manageHeader">Classes</h2>
            <div class="dataTable">
                <hr class="border">
                <table>
                    <tr>
                        <th>classID</th>
                        <th>className</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>

                    <?php
                      include_once '../includes/dbh.inc.php';
                      $getclassesinfo="SELECT classID,className,day,startTime,endTime from enrolledclasses where trainerID='$trainerid' ";
                      $result=mysqli_query($conn,$getclassesinfo);
                      while ($row=mysqli_fetch_assoc($result)){
                        echo "<tr><td>" . $row["classID"] . "</td><td>" . $row["className"] . "</td><td>"
                        . $row["day"] . "</td><td>" . $row['startTime'] . "</td><td>" . $row['endTime'] ;
                      }

                      ?>

  
 </body>

</html>                     


