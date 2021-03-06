<?php
    $title = 'Login Admin | Gym'; 
    include_once '../includes/header.inc.php';
?>

<body>

    <!--Login Form-->
    <div class="credentials-Container">
        <h4 class="form-header ">Admin Login</h4>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'emptyinput') {
                echo "<p>Fill in all the fields!</p>";
            }
            if ($_GET['error'] == 'emailExists') {
                echo "<p>User already Exists!</p>";
            }
            if ($_GET['error'] == 'wronglogin') {
                echo "<p>The email you have entered is invalid!</p>";
            }
            if ($_GET['error'] == 'wrongpassword') {
                echo "<p>The password you have entered is not correct!</p>";
            }
            if ($_GET['error'] == 'none') {
                echo "<p>Your are logged in!</p>";
            }
        } else if (isset($_GET['reset'])) {
            if ($_GET['reset'] == 'success') {
                echo "<p>Reset email sent! Please check your email.</p>";
            }
        }
        ?>
        <div>
            <form action="../includes/login.inc.php" method='POST'>
                <label for="email">Email:</label><br>
                <input type="email" class="credentials-input" name="email" id="email"><br>
                <label for="pass">Password:</label><br>
                <input type="password" class="credentials-input" name="pass" id="pass"><br>
                <input type="submit" class="credentials-button" name="submitLoginAdmin" value="Login">
            </form>

        </div>
        <div class="link-container">
            <a href="../resetPasswordRequest.php" class="credentials-link">Forgot Password?</a>
        </div>
        <div class="link-container">
            <a href="registerAdmin.php" class="credentials-link">No account? Create Account</a>

        </div>
    </div>




</body>

</html>