<?php



$data = $_POST;
//Validation
if (empty($data['firstname']) ||
empty($data['lastname']) ||
empty($data['address']) ||
empty($data['email']) ||
empty($data ['pass']) ||
empty($data ['rePass'])
){
    die('Please fill all required fields!');
}

if($data['pass']!== $data['rePass']){
    die('Password and Repeat Password should match!');

}

//Database connection
$dsn = 'mysql:dbname=gym;host=localhost';
$dbUser = 'root';
$dbPassword = '2506';
try{
    $connection = new PDO($dsn, $dbUser, $dbPassword);

}catch(PDOException $exception){
    die('Connection failed: '.$exception->getMessage());
}





?>



