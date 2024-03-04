<?php
require "session.php";

    $conn = connect();
    if($conn){
    $user = $userid;
    $sql = "DELETE FROM register WHERE loginId ='$user'";
    $query = mysqli_query($conn,$sql);
    $del = "DELETE FROM addcar WHERE loginid ='$user'";
    $query = mysqli_query($conn,$del);
    if($query){
        unset($_SESSION['login']);
        echo "<script> alert('Account Deleted Successfully!!');
          document.location.href = 'index.php';     
          </script>";
    }else{
        echo "Something Went Wrong!!";
    }
    }else{
        echo "connection error";
    }
?>

