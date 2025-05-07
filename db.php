<?php
$host = 'localhost';
$db = 'user_auth';
$port = 3307;
$username='root';
$password = '';

try{
    $conn = new PDO("mysql: host = $host;dbname=$db;port=$port",$username,$password);
    echo "Connected";
}
catch(PDOException $e){
    echo "Failed".$e->getMessage();
}
?>