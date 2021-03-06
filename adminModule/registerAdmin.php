<<?php
    $title = 'Register Admin | Gym'; 
    include_once '../includes/header.inc.php';
?>
<body>

    <!--Register Form-->
    <div class="credentials-Container">
        <h4 class="form-header ">Create Account Admin</h4>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'emptyinput') {
                echo "<p>Fill in all the fields!</p>";
            }
            if ($_GET['error'] == 'emailExists') {
                echo "<p>User already Exists!</p>";
            }
            if ($_GET['error'] == 'passworddontmatch') {
                echo "<p>The password must match!</p>";
            }
            if ($_GET['error'] == 'invalidemail') {
                echo "<p>The email you have entered is invalid!</p>";
            }
            if ($_GET['error'] == 'stmtfailed') {
                echo "<p>Something went wrong, try again!</p>";
            }
            if ($_GET['error'] == 'none') {
                echo "<p>Your account is created!</p>";
            }
        }
        ?>
        <div>
            <form action="../includes/signup.inc.php" method="POST">
                <label for="firstname">Firstname:</label><br>
                <input type="text" class="credentials-input" name="firstname" id="firstname"><br>
                <label for="lastname">Lastname:</label><br>
                <input type="text" class="credentials-input" name="lastname" id="lastname"><br>
                <label for="Telephone">Telephone:</label><br>
                <input type="text" class="credentials-input" name="telephone" id="telephone"><br>
                <label for="address">Address:</label><br>
                <input type="text" class="credentials-input" name="address" id="address"><br>
                <label for="email">Email:</label><br>
                <input type="email" class="credentials-input" name="email" id="email"><br>
                <label for="pass">Password:</label><br>
                <input type="password" class="credentials-input" name="pass" id="pass"><br>
                <label for="rePass">Repeat Password:</label><br>
                <input type="password" class="credentials-input" name="rePass" id="rePass"><br>
                <input type="submit" name="submitCreateAdmin" class="credentials-button" value="Create Account">
            </form>

        </div>
        <div class="link-container">
            <a href="../resetPasswordRequest.php" class="credentials-link">Forgot Password?</a>
        </div>
        <div class="link-container">
            <a href="loginAdmin.php" class="credentials-link">Already have an account? Login</a>

        </div>
    </div>




</body>

</html>