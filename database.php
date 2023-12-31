<?php
$username="root";
$password="";
$database="dbregister";
$hostname="localhost";
$port="3306";
$con = mysqli_connect($hostname,$username,$password,$database, $port);
if (!$con) {
$con = mysqli_connect($hostname,$username,$password,'mysql');
$sql = 'CREATE DATABASE IF NOT EXISTS '. $database ;
$result=$con->query($sql);
 //echo "Database ". $database ." created successfully\n";
}
?>
