<?php 
require 'session.php';
$user = $userid;
$con=connect();

if(isset($_POST['submit'])){
    if(isset($_POST['cfrom'])===isset($_POST['cto'])){

    $cno = $_POST['cno'];
    $_cfrom = $_POST['cfrom'];
    $cto = $_POST['cto'];
    $date =  date('Y-m-d', strtotime($_POST['date']));
    $date1 =  date('Y-m-d', strtotime($_POST['date1']));
    $time = $_POST['time'];
    $seats = $_POST['seats'];
    $price = $_POST['price'];

    $d1 = date_create("$date");
    $d2 = date_create("$date1");
    $n = date_diff($d1,$d2);
    echo $n->format("%a");

    $q1 = "SELECT * FROM addcar";
    $dqr = mysqli_query($conn,$q1);
    $flag = true;
    if(mysqli_num_rows($dqr) > 0) {
        while($row = mysqli_fetch_assoc($dqr)){
            $acno = $row["cno"];
            $auser = $row["loginid"];
            if($cno===$acno && $user===$auser){
                $flag = false;
            }
        }
    }
    if($flag === false){

    $sql1 = "INSERT INTO `offeraride` (`cno`, `cfrom`, `cto`, `date`, `date1`, `time`, `seats`, `price`) VALUES ('$cno', '$_cfrom', '$cto', '$date', '$date1', '$time', '$seats', '$price')";
    $query1 = mysqli_query($conn,$sql1);

    for($i=0; $i<$n->format("%a days");$i++) {
        $newdate = date('Y-m-d', strtotime("+".$i." days"));
        $sql = "INSERT INTO `offer_temp` (`cno`, `cfrom`, `cto`, `date`, `time`, `seat`, `price`, `login`) VALUES ('$cno', '$_cfrom', '$cto', '$newdate', '$time', '$seats', '$price', '$user')";
        $query = mysqli_query($con,$sql);
        
        if($query){
            echo "<script> alert('Ride Offered Successfully');
                document.location.href = 'index1.php';     
                </script>";
          }
          else{
              echo 'Something went wrong !!';
          }
    }
}else{
echo "<script> alert('You Need To Add Your Vehicle Before Offering Ride!!    OR   Check Your Vehicle Number!'); 
    document.location.href = 'addcar1.php';        
            </script>";
  }
}else{
    echo "<script> alert('From and To locations are not supposed to be same!!!');     
            </script>";
  }
  }
?>