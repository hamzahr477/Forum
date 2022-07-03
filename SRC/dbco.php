<?php 
$servername='localhost';
$dbname='forum';
$user='root';
$pass='';
$dbco = mysqli_connect($servername, $user, $pass,$dbname);
if (!$dbco) {
 die("Connection failed: " . mysqli_connect_error());
}
?>