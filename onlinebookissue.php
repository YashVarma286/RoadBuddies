<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/vendor/autoload.php';

require "session.php";
if($_SESSION['login']){
$conn = connect();

if(isset($_POST['submit'])){
    $cust_name = $_POST['cust_name'];
    $cust_no = $_POST['cust_no'];
    $email = $_POST['email'];
    $bseats = $_POST['bseats'];
    $loginId1 = $_SESSION['login'];
    $pdate =  date('Y-m-d', strtotime($_POST['pdate']));
    // $ddate =  date('Y-m-d', strtotime($_POST['ddate']));
    $padd = $_POST['padd'];
    $dadd = $_POST['dadd'];
    $car_id1 = $_POST['carid'];
    $seats = $_POST['seats'];
    $price = $_POST['price'];
    $emailid = $_POST['emailid'];
    $dname = $_POST['dname'];
    $totalamt = $bseats*$price;

    $sql = "INSERT INTO `booking` (`cust_name`, `cust_no`, `email`, `bseats`, `loginId1`, `pdate`, `padd`, `dadd`, `cno`, `totalamt`) VALUES ('$cust_name', '$cust_no', '$email', '$bseats', '$loginId1', '$pdate', '$padd', '$dadd', '$car_id1', '$totalamt')";

    $query = mysqli_query($conn,$sql);
    if($query){

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'roadbuddies50@gmail.com';
            $mail->Password = 'fxixmvlmbscmuvud';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('roadbuddies50@gmail.com');
            $mail->addAddress($_POST['emailid']);
            $mail->isHTML(true);
            $mail->Subject = "Booking Details ";
            $mail->Body ="Dear ".$dname.",  
            ".$cust_name." has booked ".$bseats." seats.     
            Mobile No : ".$cust_no."        
            Date : ".$pdate."      
            PickUp Address : ".$padd."";
            $mail->send();
        // mail($emailid,"     Booking Details ",
        // "Dear ".$dname.", "
        // .$cust_name." has booked ".$bseats." seats.     
        // Mobile No : ".$cust_no."     
        // Date : ".$pdate."      
        // PickUp Address : ".$padd);

        $email1 = $email;
        // mail($email, "Ride Booked Successfully", 
        $c_body=" Dear ".$cust_name.",

    
        Thank you for choosing Road Buddies. We are excited to confirm your reservation and provide you with all the details you need for a hassle-free travel experience.

        Your car has been reserved for ".$pdate." at ".$padd." and is scheduled to be returned on ".$ddate." at ".$dadd.". 

        We are committed to providing you with exceptional service, and we want to ensure that your experience with us is as smooth as possible. To that end, we want to remind you          of a few things:

        1. Please arrive at the pick-up location on time. If you are running late, please let us know in advance so that we can make the necessary arrangements.
        2. No Smoking or Drinking allowed while travelling!
        
        3. Our customer service team is available to assist you 24/7.

        Thank you again for choosing Road Buddies. We look forward to serving you and providing you with a first-class experience.

        Best regards,

        Team,
        Road Buddies ";
             $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'roadbuddies50@gmail.com';
            $mail->Password = 'fxixmvlmbscmuvud';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('roadbuddies50@gmail.com');
            $mail->addAddress($_POST['email']);
            $mail->isHTML(true);
            $mail->Subject = "Ride Booked Successfully";
            $mail->Body =$c_body;
            $mail->send();

$sql5 = "SELECT * FROM offer_temp ";
$query5 = mysqli_query($conn,$sql5);
if($query5){
    if (mysqli_num_rows($query5)) {
        $oldseats = $seats;
      $newseats = $oldseats - $bseats;
    while($row =  mysqli_fetch_assoc($query5)){
      // $cfrom = $row['cfrom'];
      // $cto = $row['cto'];
       echo $row["cno"]; 
       $sql4 = "UPDATE offer_temp SET seat='$newseats'  WHERE cno = '$car_id1' AND date = '$pdate' AND cfrom = '$padd' AND cto = '$dadd'";
       $query1 = mysqli_query($conn,$sql4);
       $q1 = "SELECT * FROM offer_temp";
      $q3 = mysqli_query($conn, $q1); 
      if(mysqli_num_rows($q3))  
            {  
              while($row = mysqli_fetch_assoc($q3)){
                $date = $row['date'];
                $seat = $row['seat'];}}
              $curr_date = date('Y-m-d');
      
                $q2 = "DELETE FROM offer_temp WHERE date < '$curr_date'";  
                $q4 = mysqli_query($conn, $q2);
       if($query1){
       echo "<script> alert('Your Car Has Been Booked Successful');
       document.location.href = 'index1.php';     
       </script>";
       }
       else{
        
         echo "<br>"; 
         echo "<br>A S Table Not updated<br>";
       }
    }
    }else{
        echo "No records";
    }
}else{
    echo "Query not run";
}
}
else{
    echo "<script> alert('Something Went Wrong');
    </script>";
}
}
?>
  <?php
}
else{
  header("location:login.php");
}
?>