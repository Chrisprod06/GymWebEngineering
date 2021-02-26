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
            <div>
            <?php
                $selector = $_GET['selector'];
                $validator = $_GET['validator'];

                if(empty($selector) || empty($validator)){
                    echo "Could not validate your request!";

                }else{
                    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){
                        ?>
                         <form action="../includes/resetPassword.inc.php" method= 'POST'>
                            <input type="hidden" name = "selector" value="<?php echo $selector;?>">
                            <input type="hidden" name = "validator" value="<?php echo $validator;?>">
                            <input type="password" name="pass" placeholder="Enter a new password..">
                            <input type="password" name="RePass" placeholder="Repeat the new password..">
                            <input type="submit" name = "submitResetPass" value="Reset Password">
                        </form>
                            
                        <?php
                        
                    }
                }
            ?>
               
            </div>                               
       </div>      
    </body>
</html>