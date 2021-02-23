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
        
                $sql = "SELECT userID, firstname, lastname, telephone, address ,email, role FROM users WHERE role=1; ";
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
                    //echo "</table>";
                }else{
                    echo "No results.";
                }
                exit();
            ?>
        </table>


    </div>
        
    </body>
</html>