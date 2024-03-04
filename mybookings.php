<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Bookings</title>
</head>
<body>
<img class="bg" style="height: 100vh; width: 100vw;" src="Img/renbg.jpg" alt="Image">

<?php 
require 'session.php';
if($_SESSION['login']){
$login_customer = $_SESSION['login']; 
// $login_customer = $id; 

    $sql1 = "SELECT * FROM offeraride o, booking b, addcar a WHERE loginId1='$login_customer' AND a.cno=b.cno AND b.cno=o.cno ";
    $result1 = mysqli_query($conn, $sql1);
    // $sql2 = "SELECT * FROM offeraride";
    // $newprice = $bseats*$price;
if($result1){
    if (mysqli_num_rows($result1)) {
?>
<div class="container">
      <div class="jumbotron">
        <h1 class="text-center">Your Bookings</h1>
        <p class="text-center"> Hope you enjoyed our service </p>
      </div>
    </div>

    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="5%">Car</th>
<th width="5%">PickUp Date</th>
<!-- <th width="5%">DropOff Date</th> -->
<th width="9%">PickUp Address</th>
<th width="9%">DropOff Address</th>
<th width="6%">Price Per Seat</th>
<th width="5%">Seats Booked</th>
<th width="5%">Total Amount</th>
</tr>
</thead>
<?php
        while($row = mysqli_fetch_assoc($result1)) {
?>
<tr>
<td><?php echo $row["cname"]; ?></td>
<td><?php echo $row["pdate"] ?></td>
<!-- <td><?php echo $row["ddate"]; ?></td> -->
<td><?php echo $row["padd"]; ?> </td>
<td><?php echo $row["dadd"]; ?></td>
<td><?php echo $row["price"]; ?></td>
<td><?php echo $row["bseats"]; ?></td>
<td><?php echo $row["totalamt"]; ?> </td>

</tr>
<?php        } ?>
                </table>
                </div> 
        <?php } else {
            ?>
        <div class="container">
      <div class="jumbotron">
        <h1 class="text-center">You have not booked any cars till now!</h1>
        <p class="text-center"> Please book cars in order to view your data here. </p>
      </div>
    </div>

            <?php
        } 
    }else{
        echo "Query Not Runned";
    }
    
    ?>   
<style>
  /* body {
    background-image: url(Img/renbg.jpg);
    background-image: url(Img/car1.jpg);
} */
.progress {
        position: fixed;
    }
.bg {
    position: fixed;
    z-index: -99;
    opacity: 1;
  }
.container {
  margin-right: auto;
  margin-left: auto;
  padding-left: 15px;
  padding-right: 15px;
}  
.jumbotron {
    padding-top: 30px;
    padding-bottom: 30px;
    margin-bottom: 30px;
    color: inherit;
    background-color: transparent;
    /* border: 1px solid #e7e7e7; */
    box-shadow: inset 0 2px 0 rgba(0,0,0,0.05);
}
/* .jumbotron {

} */
h1, h2, h3, h4, h5, h6 {
    font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 400;
    margin: 10px 0;
}
.jumbotron h1, .jumbotron .h1 {
    color: inherit;
}
.text-center {
    text-align: center;
}
.jumbotron p {
    margin-bottom: 15px;
    font-size: 21px;
    font-weight: 200;
}
p {
    margin: 0 0 10px;
    font-family: "Segoe UI",Arial,sans-serif;

}
.table-responsive {
    overflow-x: auto;
    min-height: 0.01%;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
table {
    background-color: transparent;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}
thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #eeeeee;
    font-family: "Segoe UI",Arial,sans-serif;
    background-color: #fff;
}
th {
    text-align: left;
}
.table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 2px solid #eeeeee;
    font-size: 18px;
}

@media (min-width: 768px){
.container {
    width: 750px;
}
}
@media screen and (min-width: 768px){
.container .jumbotron, .container-fluid .jumbotron {
    padding-left: 60px;
    padding-right: 60px;
}
}
@media screen and (min-width: 768px){
.jumbotron {
    padding-top: 48px;
    padding-bottom: 48px;
}
}
@media screen and (min-width: 768px){
.jumbotron h1, .jumbotron .h1 {
    font-size: 63px;
}
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