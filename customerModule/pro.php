<?php


require('config.php');


extract($_POST);


$sql = "INSERT into contactus (name,email,message,created_date) VALUES('" . $name . "','" . $email . "','" . $message . "','" . date('Y-m-d') . "')";


$success = $mysqli->query($sql);


if (!$success) {
    die("Couldn't enter data: ".$mysqli->error);
}


echo "<script>
alert('Thanks for contacting us!');
window.location.href='indexCustomers.php';
</script>"

?>