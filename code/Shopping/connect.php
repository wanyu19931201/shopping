<?php
$host = '127.0.0.1';

$user = 'andy';

$passwd = '123456';

$database = 'Shopping';

$connect = new mysqli($host, $user, $passwd, $database);
 
if ($connect->connect_error) {
    die("Connect Fail: " . $connect->connect_error);
}


?>