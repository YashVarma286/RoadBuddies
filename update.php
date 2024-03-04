<?php
require "session.php";
$conn = connect();
if(isset($_POST['submit'])){
    $car_id = $_POST['car_id'];
    $o_date =  date('Y-m-d', strtotime($_POST['o_date']));
    $o_from = $_POST['o_from'];
    $o_to = $_POST['o_to'];

    $_cfrom = $_POST['cfrom'];
    $cto = $_POST['cto'];
    $date =  date('Y-m-d', strtotime($_POST['date']));
    $time = $_POST['time'];
    $seats = $_POST['seat'];
    $price = $_POST['price'];

    $sql = "UPDATE `demo`.`offer_temp` SET cfrom='$_cfrom', cto='$cto', date='$date', time='$time', seat='$seats', price='$price'  WHERE cno='$car_id' AND date='$o_date' AND cfrom='$o_from' AND cto='$o_to'";
    $query = mysqli_query($conn,$sql);
        if($query){


            echo "<script> alert('Ride Updated Successful');
          document.location.href = 'drivercancel.php';     
          </script>";
        }
        else{
            echo 'Something went wrong !!';
        }
}


?>