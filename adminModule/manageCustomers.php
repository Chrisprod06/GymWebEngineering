<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header('location: loginAdmin.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Manage Customers | Gym</title>
        <link rel="stylesheet" href="../style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../myScripts.js"></script>
        
    </head>
    <body>

<!--Navbar-->
<?php
        include_once 'navbar.php';
    ?>

    <div id="main">
        <!--Table to present data-->
        <div class="dataTableContainer">     
            <h2 class = "manageHeader">Customers</h2>
            <div class="dataTable">
            <hr class ="border">
            <table>
                <tr>
                    <th>UserID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Telephone</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>

                <!--PHP script to load data from users table-->
                <?php
                
                    include_once '../includes/dbh.inc.php';
            
                    $sql = "SELECT userID, firstname, lastname, telephone, address ,email, role FROM users WHERE role=3; ";
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
            <!--Form to add customer accounts-->
            <h2 class = "manageHeader">Add Customer</h2>
            <hr class ="border">
            <form class = "addCustomerForm" action="../includes/addCustomer.inc.php" method = "POST">
                <label for="firstname">Firstname:</label><br>
                <input class = "addCustomerFormInput" type="text" name = "firstname"></input><br>
                <label for="lastname">Lastname:</label><br>
                <input class = "addCustomerFormInput" type="text" name = "lastname"></input><br>
                <label for="telephone">Telephone:</label><br>
                <input class = "addCustomerFormInput" type="int" name = "telephone"></input><br>
                <label for="address">Address:</label><br>
                <input class = "addCustomerFormInput" type="int" name = "address"></input><br>
                <label for="email">Email:</label><br>
                <input class = "addCustomerFormInput" type="email" name = "email"></input><br>
                <input class = "addCustomerFormButton" type="submit" name = "submitAddCustomer" value = "Add customer"><br>
            </form>
         </div>           
        
        <div class="dataFormContainer">
        <!--Form to add customer accounts-->
        <h2 class = "manageHeader">Remove Customer</h2>
        <hr class ="border">
        <form action="../includes/removeCustomer.inc.php" method = "POST">
            <label for="users">Choose a user:</label>
            <select name="users" id="users">
                <option value=" "></option>
                <!--PHP script to retrieve user ids to the list-->
                <?php
                    include_once '../includes/dbh.inc.php';
                    $sql = "SELECT userID FROM users WHERE role=3;";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value = ".$row['userID'].">". $row['userID']. "</option>";
                    }
                ?>    
            </select>
            <input  type="submit" name ="submitRemoveCustomer" value = "Delete customer"><br>
        </form>
        </div>
        

    </div>
        
    </body>
</html>