<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
</head>
<body>
<!-- <img class="Img1" src="Img/renbg.jpg" alt="Image"> -->
    <div class="h1">
        <h1>Available Cars</h1>
    </div>
<section class="menu-content">
<?php   
    require "session.php";
    if($_SESSION['login']){
    $conn = connect();
    if(isset($_POST['submit'])){
            $from = $_POST['from1'];
            $to = $_POST['to1'];
            $date1 = $_POST['date1'];
            
            $dq = "SELECT * FROM addcar a, offeraride t WHERE t.cfrom = '$from' AND t.cto = '$to' AND a.cno = t.cno AND t.seats > '0'";
            $dqr = mysqli_query($conn,$dq);
            if($dqr){
              $flag = true;
            if(mysqli_num_rows($dqr) > 0) {
              while($row = mysqli_fetch_assoc($dqr)){
                  $d1 = $row["date"];
                  $d2 = $row["date1"];
                  if(($date1 >= $d1) && ($date1 <= $d2)){
                    $flag=false;
                  }
              }}
            }else{
                  echo "<script> alert('Cars Not Found !!');
                  </script>";
                }
          // if(($date1 >= $d1) && ($date1 <= $d2)){
          if($flag===false){
            $sql1 = "SELECT * FROM addcar a, offer_temp t WHERE t.cfrom = '$from' AND t.cto = '$to' AND a.cno = t.cno AND t.seat > '0' AND t.date = '$date1'";
            $result1 = mysqli_query($conn,$sql1);

          if($result1){
            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)){
                    $cno = $row1["cno"];
                    $cname = $row1["cname"];
                    $cfrom = $row1["cfrom"];
                    $cto = $row1["cto"];
                    $seats = $row1["seat"];
                    $price = $row1["price"];
                    $car_img = $row1["filename"];
                    $time = $row1["time"];
                    $dt = $row1["date"];
                 
                    ?>
                  
            <!-- <a href="booking.php?cno=<?php echo($cno) ?>">
            <div class="sub-menu">
            
            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Car image cap">
            <h5><b> <?php echo $cname; ?> </b></h5>
            <h6> From: <?php echo $cfrom; ?></h6>
            <h6> To: <?php echo $cto; ?></h6>
            <h6> Date: <?php echo $dt; ?></h6>
            <h6> Time: <?php echo $time; ?></h6>
            <h6> Available Seats: <?php echo $seats; ?></h6>
            <h6> Price: <?php echo $price; ?></h6>

            </div> 
            </a> -->
            <form action="booking.php?cno=<?php echo($cno) ?>" method="post" >
            <input type="hidden" name="date1" value="<?php echo $date1; ?>">
            <button type="submit" name="submit">
                <div class="sub-menu">
                
                  <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Car image cap">
                  <h5><b> <?php echo $cname; ?> </b></h5>
                  <h6> From: <?php echo $cfrom; ?></h6>
                  <h6> To: <?php echo $cto; ?></h6>
                  <h6> Date: <?php echo $dt; ?></h6>
                  <h6> Time: <?php echo $time; ?></h6>
                  <h6> Available Seats: <?php echo $seats; ?></h6>
                  <h6> Price: <?php echo $price; ?></h6>

                </div> 
              </button>
            </form>

            <?php }
            }
            else {
                ?>
                  <h1> No Cars Available </h1>
                <?php
            }
          }else{

            echo "<script> alert('Query Not Run');
            </script>";
          }
        }else {
          ?>
            <h1> Cars Not available  </h1>
          <?php
      }
        }
          else{
            echo "<script> alert('From and To locations are NOT supposed to be same!!!');
            document.location.href = 'findride1.php';          
                    </script>";
          }
            ?>  
</section>
<?php
}
else{
  header("location:login.php");
}
?>
<style>

.h1{
    text-align: center;
    margin-top: 50px;
    margin-left: auto;
    font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 400;
    color: #333333;

}
body {
    background-image: url(Img/renbg.jpg);
    height: 100vh; width: 100vw;
}
/* .Img1 {
  width: 100%;
  height: 100%;
  position: fixed;
  z-index: -5;
  opacity: 1;
  margin-top: 0px;
} */
.menu-content {
  display: grid;
  grid-gap: 20px;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  justify-items: center;
}

.sub-menu {
  background: #fff;
  box-shadow: 0 1px 5px rgba(104, 104, 104, 0.8);
  width: 270px;
  height: 340px;
  padding: 1.5rem;
  text-align: center;
}

.sub-menu:hover {
  box-shadow: 0 1px 20px rgba(104, 104, 104, 0.8);
}

.card-img-top {
  max-height: 150px;
  max-width: 230px;
  min-height: 150px;
  min-width: 230px;
  z-index: 0;
}
a {
    color: inherit;
    text-decoration: none;
    background-color: transparent;
    cursor: pointer;
}
h5, h6{
    font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 400;
    margin: 10px 0;
    line-height: 1.1;
    color: #333333;
}
h5 {
    font-size: 18px;
}
h6 {
    font-size: 16px;
}

@media (max-width: 756px) {
  .sub-menu {
    width: 100%;
    height: 100%;
  }
  .box {
    width: 100%;
  }
}
</style>
</body>
</html>