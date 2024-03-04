<?php
require "session.php";
$conn = connect();
if(isset($_POST['delete'])){
    $cno = $_POST['cno'];
    $q1 = "DELETE FROM addcar WHERE cno = '$cno'";
    $q2 = mysqli_query($conn,$q1);
    if($q2){
        echo "<script> alert('Car Deleted Successfully');
        document.location.href = 'mycars.php';     
        </script>";
    }else{
        echo "Something Went Wrong";
    }
}

?>