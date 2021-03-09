<!--Christophoros Prodromou, Vangelis Photiou, Stephanos Christodoulou-->
<!DOCTYPE html>

<html>

<head>
    <title>Reset Password | Gym</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!--Login Form-->
    <div class="credentials-Container">
        <h4 class="form-header ">Reset Password</h4>
        <p>An e-mail will we be send to your with
            <br> instructions on how to reset your password.
        </p>
        <div>
            <form action="../includes/resetPasswordRequest.inc.php" method='POST'>
                <label for="email">Email:</label><br>
                <input type="email" class="credentials-input" name="email" id="email" placeholder="Enter your email address..."><br>
                <input type="submit" class="credentials-button" name="submit" value="Send Request">
            </form>
        </div>
    </div>
</body>

</html>