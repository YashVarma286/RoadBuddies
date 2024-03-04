<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Users</title>
</head>

<body>
<?php 
require 'session1.php';
$conn = connect();
if($_SESSION['login1']){
$login_customer = $_SESSION['login1'];  

    $sql1 = "SELECT * FROM register";

    $result1 = mysqli_query($conn, $sql1);
if($result1){
    if (mysqli_num_rows($result1)) {
?>
<div class="container">
      <div class="jumbotron">
        <h1 class="text-center">Registered Users</h1>
        <p class="text-center">  </p>
      </div>
    </div>

    <div class="table-responsive" style="padding-left: 200px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="5%">Customer Name</th>
<th width="5%">Customer loginId</th>
<th width="6%">Date of Birth</th>
<th width="6%">Customer Email</th>
<th width="5%">Mobile Number</th>
<th width="5%">Gender</th>
<th width="5%">Action</th>
</tr>
</thead>
<?php
        while($row = mysqli_fetch_assoc($result1)) {
?>
<tr>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["loginId"]; ?> </td>
<td><?php echo $row["dob"] ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["mobile"]; ?></td>
<td><?php echo $row["gender"]; ?> </td>
<td><form action="" method="post" class="form1">
<button type="submit" name="edit" class="btn"> 
          <span class="btnText">Manage</span>             
      </button>
      <button type="submit" name="cancel" class="button"> 
          <span class="btnText">Delete</span>             
      </button>
</form> 
</td>
</tr>
<?php        } ?>
                </table>
                </div> 
        <?php } else {
            ?>
        <div class="container">
      <div class="jumbotron">
        <h1 class="text-center">You have no Registered Users till now!</h1>
      </div>
    </div>

            <?php
        } 
    }else{
        echo "Query Not Runned";
    }
    ?>
    
    <style>
        .button, .button1 {
    border: 0.5px solid black;
    border-radius: 2px;
    text-align: center;
 }
 .button:hover, .button1:hover{background-color: red;color: #fff;}
 button:hover{background-color: green;color: #fff;}
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
h1 {
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
    font-size: 25px;
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