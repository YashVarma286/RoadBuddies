
<?php 
// mysqli_connect() function opens a new connection to the MySQL server.
require 'connection.php';
$conn = Connect();

session_start();// Starting Session

// Storing Session
$user_check=$_SESSION['login'];

// $user_pass=$_SESSION['password'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT name,password,loginId FROM register WHERE loginId = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);

$login_session =$row['name'];
$user_pass = $row['password'];
$userid = $row['loginId'];


// echo "$login_session <br>";
// echo "$user_pass <br>";
// echo "$userid";
?>
