<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/booking.css">
    <title>Booking Details</title>
</head>

<body>
<!-- <img src="Img/renbg.jpg" alt="Background Image"> -->
<?php
require "session.php";
if($_SESSION['login']){
$conn = Connect();
$car_id = $_GET["cno"];
// $car_id = $_POST["cno"];
// $dt = $_GET["date"];
$dt = $_POST['date1'];
$sql2 = "SELECT * FROM addcar WHERE cno = '$car_id'";
$sql3 = "SELECT * FROM offer_temp WHERE cno = '$car_id' AND date = '$dt' ";
// $sql2 = "SELECT * FROM addcar a, offeraride o WHERE a.cno = $car_id AND a.cno = o.cno";

$result1 = mysqli_query($conn, $sql2);
$result2 = mysqli_query($conn, $sql3);
if(mysqli_num_rows($result1)){
    while($row1 = mysqli_fetch_assoc($result1)){
        $cno = $row1["cno"];
        $cname = $row1["cname"];
        $car_img = $row1["filename"];
        $loginIdb = $row1["loginid"];
    }
}
if(mysqli_num_rows($result2)){
    while($row1 = mysqli_fetch_assoc($result2)){
        $cfrom = $row1["cfrom"];
        $cto = $row1["cto"];
        $date = $row1["date"];
        $seats = $row1["seat"];
        $price = $row1["price"];
    }
}
$sql6 = "SELECT * FROM register WHERE loginId = '$loginIdb'";
$result6 = mysqli_query($conn, $sql6);
if(mysqli_num_rows($result6)){
    while($row1 = mysqli_fetch_assoc($result6)){
        $emailid = $row1["email"];
        $dname = $row1["name"];
    }
}
?>
    <div class="s1"><h3>Selected Car</h3></div> 
        <div class="sub-menu"> 
             <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Car image cap">
             <div class="selected">
            <h5><b> <?php echo $cname; ?> </b></h5>
            <h6> Car No: <?php echo $cno; ?></h6>
             <h6> From: <?php echo $cfrom; ?></h6>
             <h6> To: <?php echo $cto; ?></h6>
             <h6> Date: <?php echo $date; ?></h6>
            <h6> Available Seats: <?php echo $seats; ?></h6>
            <h6> Price/Seat: <?php echo $price; ?></h6>
            <!-- <h6> Driver Email: <?php echo $emailid; ?></h6> -->
             </div>
     </div> 


    <div class="form">
        <form action="bookingconfirm.php" method="post">
                <div class="bookingdetails">
                    <span class="title"><h2>Enter Your Booking Details</h2></span>

                    <div class="fields">
                        <div class="inputfield">
                            <input type="text" placeholder="Customer Full Name" name="cust_name" required>
                        </div>
                        <div class="inputfield">
                            <input type="number" placeholder="Customer number" name="cust_no" max=9999999999 required>
                        </div>
                        <div class="inputfield">
                            <input type="text" placeholder="Email" name="email" required>
                        </div>
                        <div class="inputfield">
                            <input type="number" placeholder="Seats To Book" min=1 max=6 name="bseats" required>
                        </div>
                    </div>
                       
                        <input type="hidden" name="pdate" value="<?php echo $date; ?>">
                        <input type="hidden" name="carid" value="<?php echo $car_id; ?>">
                        <input type="hidden" name="seats" value="<?php echo $seats; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <input type="hidden" name="emailid" value="<?php echo $emailid; ?>">
                        <input type="hidden" name="dname" value="<?php echo $dname; ?>">
                        <input type="hidden" name="padd" value="<?php echo $cfrom; ?>">
                        <input type="hidden" name="dadd" value="<?php echo $cto; ?>">

                        <!-- <div class="inputfield">
                            <input type="number" placeholder="Total Amount" name="total" max=99999 ><?= $total = $price*$bseats;?></input>

                        </div> -->

                        <button type="submit" name="submit" class="sumbit"> 
                            <span class="btnText">BOOK MY CAR</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
        </form>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
      var dtToday = new Date();
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
        month = '0' + month.toString();
      if(day < 10)
        day = '0' + day.toString();
      var maxDate = year + '-' + month + '-' + day;
      document.getElementById("date").setAttribute('min', maxDate);
      document.getElementById("date1").setAttribute('min', maxDate);
  </script>    
<style>    
body {
    background-image: url(Img/renbg.jpg);
    position: inherit;
    height: 100vh; width: 100vw;
    background-repeat: no-repeat;
    top: 0;
}
.bookingdetails {
    width: 601px;
    height: 460px;
}
.form {
    border: none;
}
.s1 {
    background-color: #fff;
    width: 600px;
    height: 40px;
margin-left: 30%; 
text-align: center;
margin-top: 20px;
font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 400;
    line-height: 1.1;
    color: #333333;
    font-size: 18px;
    padding-top: 10px;
 }
 
.sub-menu {
  background: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  box-shadow: 0 1px 5px rgba(104, 104, 104, 0.8);
  width: 600px;
  height: 230px;
  padding: 1.5rem;
  text-align: center;
  margin-left: 30%;
  margin-top: 0px;
}

/* .sub-menu:hover {
   box-shadow: 0 1px 20px rgba(104, 104, 104, 0.8); 
} */

.card-img-top {
  max-height: 150px;
  max-width: 230px;
  min-height: 150px;
  min-width: 230px;
  z-index: 0;
  margin-right: 40px;
}
h5, h6{
    font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 400;
    margin: 10px 0;
    line-height: 1.1;
    color: #333333;
    font-size: 18px;
}
.form {
    /* box-shadow: 0 1px 20px rgba(104, 104, 104, 0.8); */
    margin-top: 10px;

}
</style>

</body>
</html>
<?php
}
else{
  header("location:login.php");
}
?>