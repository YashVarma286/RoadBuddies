<?php 
// mysqli_connect() function opens a new connection to the MySQL server.
require 'connection.php';
$conn = Connect();

session_start();
$user_check1=$_SESSION['login1'];

$query1 = "SELECT password,loginId FROM admin1 WHERE loginId = '$user_check1'";
$ses_sql1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($ses_sql1);
$user_pass1 = $row1['password'];
$userid1 = $row1['loginId'];

?>