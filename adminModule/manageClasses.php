<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header('location: loginAdmin.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Manage Classes | Gym</title>
        <link rel="stylesheet" href="../style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../myScripts.js"></script>
        
    </head>
    <body>


<?php
        include_once 'navbar.php';
    ?>

    <div id="main">
    <div class="dataTableContainer">     
            <h2 class = "manageHeader">Classes</h2>
            <div class="dataTable">
            <hr class ="border">
            <table>
                <tr>
                    <th>ClassID</th>
                    <th>Class Name</th>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Role</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Telephone</th>
                </tr>

                <!--PHP script to load data from  table-->
                <?php
                
                    include_once '../includes/dbh.inc.php';
                    //sql query not working
                    $sql = "SELECT classID,className,day,startTime,endTime,role,firstname,lastname,telephone,email, FROM users NATURAL JOIN classes; ";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if($resultCheck>0){
                        while($row = mysqli_fetch_assoc($result)){
                            
                            if ($row['role'] == 1){
                                $role = 'Admin';
                            }
                            else if ($row['role'] == 2){
                                $role = 'Trainer';
                            }
                            else if ($row['role'] == 3){
                                $role = 'Customer';
                            }

                            echo "<tr><td>" . $row["userID"]. "</td><td>" . $row["firstname"] . "</td><td>"
                            . $row["lastname"]. "</td><td>". $row['telephone']. "</td><td>". $row['address']. "</td><td>". $row['email']. "</td><td>". $role ."</td></tr>";
                        }
                        echo "</table>";
                    }else{
                        echo "No results.";
                    }
                    
                ?>
            </table>
            </div>     
        </div>

        <div class="dataFormContainer">
            <!--Form to add classes-->
            <h2 class = "manageHeader">Add Class</h2>
            <hr class ="border">
            <form class = "addCustomerForm" action="../includes/addClass.inc.php" method = "POST">
            <label for="classID">Class ID:</label><br>
                <input class = "addCustomerFormInput" type="text" name = "classID"></input><br>
                <label for="className">Class Name:</label><br>
                <input class = "addCustomerFormInput" type="text" name = "className"></input><br>
                <label for="day">Day:</label>
                <select class = "addCustomerFormInput" name="day" id="day">
                    <option value="null"></option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select><br>
                <label for="startTime">Start Time:</label><br>
                <input class = "addCustomerFormInput" type="time" name = "startTime"></input><br>
                <label for="endTime">End Time:</label><br>
                <input class = "addCustomerFormInput" type="time" name = "endTime"></input><br>
                <label for="email">Trainer ID:</label><br>
                <select class = "addCustomerFormInput" name="trainerID" id="trainerID">
                    <option value="null"></option>
                    <!--PHP script to get trainers from database-->
                    <?php
                    include_once '../includes/dbh.inc.php';
                    $sql = "SELECT userID, firstname, lastname FROM users WHERE role=2;";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value = ".$row['userID'].">". $row['userID']. ",".$row['firstname']." ".$row['lastname']. "</option>";
                    }
                ?>    
                </select>
                <input class = "addCustomerFormButton" type="submit" name = "submitAddClass" value = "Add class"><br>
            </form>
         </div>    
    </div>
        
    </body>
</html>