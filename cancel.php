<?php
require "session.php";
$loginid = $userid;
$conn = connect();

//Driver Cancel
if(isset($_POST['yes'])){

    $car_id = $_POST['car_id'];
    $o_date =  date('Y-m-d', strtotime($_POST['o_date']));
    $o_from = $_POST['o_from'];
    $o_to = $_POST['o_to'];

    $sql = "DELETE FROM offer_temp WHERE cno='$car_id' AND date='$o_date' AND cfrom='$o_from' AND cto='$o_to'";
    $query = mysqli_query($conn,$sql);
    
    $curr_date = date('Y-m-d');
    $sql4 = "SELECT * FROM offeraride o, booking b, addcar a WHERE loginId1!='$loginid' AND a.cno=b.cno AND a.loginid='$loginid' AND b.cno=o.cno AND date>='$curr_date'";

    $result1 = mysqli_query($conn, $sql4);

    if($result1){
    if (mysqli_num_rows($result1)) {
        while($row = mysqli_fetch_assoc($result1)) {
            $cust_email = $row["email"];
    if($query){

        mail($cust_email, "Ride Canceled ! ","Dear Customer, 

        Your Ride Has Been Canceled by the Driver.  
           
        Sorry for the inconvinience caused !
        
        
        Team Roadbuddies,
        Thanks & regards.");  
        $sql1 = "DELETE FROM booking WHERE cno='$car_id' AND pdate='$o_date' AND padd='$o_from' AND dadd='$o_to'";
        $query1 = mysqli_query($conn,$sql1);  
        echo "<script> alert('Ride Canceled');
      document.location.href = 'drivercancel.php';     
      </script>";
    }
    else{
        echo 'Something went wrong !!';
    }
}}
}
}

//Customer cancel
if(isset($_POST['yes1'])){

    $car_id = $_POST['car_id'];
    $o_date =  date('Y-m-d', strtotime($_POST['o_date']));
    $o_from = $_POST['o_from'];
    $o_to = $_POST['o_to'];
    $total = $_POST['total'];
    $bseats = $_POST['bseats'];

    echo $car_id."<br>";
    echo $o_date."<br>";
    echo $o_from."<br>";
    echo $o_to."<br>";
    echo $bseats."<br>";

    $sql1 = "DELETE FROM booking WHERE loginId1='$loginid' AND cno='$car_id' AND pdate='$o_date' AND padd='$o_from' AND dadd='$o_to' AND totalamt='$total'";
    $query1 = mysqli_query($conn,$sql1);
    if($query1){

    $q1 = "SELECT * FROM offer_temp WHERE cno='$car_id'  AND date='$o_date' AND cfrom='$o_from' AND cto='$o_to'";
    $q2 = mysqli_query($conn,$q1);
    if(mysqli_num_rows($q2)){
        while($row1 = mysqli_fetch_assoc($q2)){
            $cno = $row1["cno"];
            $from = $row1["cfrom"];
            $to = $row1["cto"];
            $date = $row1["date"];
            $time = $row1["time"];
            $seat = $row1["seat"];
        }
    }else{
        echo "error";
    }
?>
<div class="sub-menu"> 
             <div class="selected">
            <h6> Car No: <?php echo $cno; ?></h6>
             <h6> From: <?php echo $from; ?></h6>
             <h6> To: <?php echo $to; ?></h6>
             <h6> Date: <?php echo $date; ?></h6>
            <h6> Available Seats: <?php echo $seat; ?></h6>
            <h6> Time: <?php echo $time; ?></h6>
       
             </div>
<?php
$oldseat = $seat;
$b_seat = $bseats;
$newseats = $oldseat+$b_seat;
$q3 = "UPDATE `demo`.`offer_temp` SET seat='$newseats' WHERE cno='$cno'  AND date='$date' AND cfrom='$from' AND cto='$to'";
$q4 = mysqli_query($conn, $q3);

$q5 = "SELECT * FROM addcar WHERE cno='$cno'";
$q6 = mysqli_query($conn, $q5);
if(mysqli_num_rows($q6)){
    while($row1 = mysqli_fetch_assoc($q6)){
        $driver_id = $row1["loginid"];
    }
}
$q7 = "SELECT * FROM register WHERE loginId='$driver_id'";
$q8 = mysqli_query($conn, $q7);
if(mysqli_num_rows($q8)){
    while($row1 = mysqli_fetch_assoc($q8)){
        $driver_email = $row1["email"];
    }
}
// $q9 = "SELECT * FROM register WHERE loginId='$'";
// $q10 = mysqli_query($conn, $q9);
// if(mysqli_num_rows($q10)){
//     while($row1 = mysqli_fetch_assoc($q10)){
//         $c_name = $row1["name"];
//     }
// }
if($q4){

    mail($driver_email, "Booking Canceled ! ", "Dear Driver,

    Customer  going from .'$from'. to .'$to'. on date .'$date'. has canceld their bookings..!
    
    
    
    Team Road Buddies,
    Thanks & regards.");
    echo "<script> alert('Ride Canceled');
      document.location.href = 'cust_cancel.php';     
      </script>";
    // echo "success";
}

    }
    else{
        echo 'Something went wrong !!';
    }
}

?>