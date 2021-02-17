
<?php
    $mysql_host = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '250699cph';
    $conn_error = 'Could not connect';

    mysql_connect($mysql_host, $mysql_username, $mysql_password) or die($conn_error);
?>