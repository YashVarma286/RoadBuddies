<?php
require "session.php";
if($_SESSION['login']){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cars</title>
</head>

<body>
<img class="bg" style="height: 100vh; width: 100vw;" src="Img/renbg.jpg" alt="Image">

<div class="h1">
        <h1>Your Cars Details</h1>
    </div>
<section class="menu-content">

<?php 
$conn = connect();
$loginid = $_SESSION['login'];
$sql = "SELECT * FROM addcar WHERE loginid = '$loginid'";
$resulta = mysqli_query($conn, $sql);
          if($resulta){
            if(mysqli_num_rows($resulta) > 0) {
                while($row1 = mysqli_fetch_assoc($resulta)){
                    $cno = $row1["cno"];
                    $cname = $row1["cname"];
                    $ctype = $row1["ctype"];
                    $comname = $row1["comname"];
                    $cdesc = $row1["cdesc"];
                    $car_img = $row1["filename"];
?>

        <div class="sub-menu">
            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Car image cap">
            <h5><b> <?php echo $cname; ?> </b></h5>
            <h6><?php echo $cno; ?></h6>
            <h6><?php echo $ctype; ?></h6>
            <h6><?php echo $comname; ?></h6>
            <h6><?php echo $cdesc; ?></h6>
            
            <button type="submit" name="delete" onclick="dele()" class="button1"> 
                <span class="btnText">Delete</span>             
            </button>
        </div> 
        <div class="del" id="del">
      <div class="p1" >
          <p>Are you sure you want to delete your vehicle?</p>
      </div><form action="deletevehicle.php" method="post">
      <button type="submit" name="delete" onclick="del1()" class="btn" class="btn2"> 
          <span class="btnText">Yes</span>             
      </button>
      <input type="hidden" name="cno" value="<?php echo $cno; ?>" >
    </form>
      <button type="submit" name="no" onclick="delet()" class="btn btn1" class="btn2"> 
          <span class="btnText">No</span>
      </button>
  </div>
        <?php }
            }
            else {
                ?>
<h1>You Have Not Added Any Cars Yet</h1>
                <?php
            }
          }else{
            echo "Something went wrong";
          }
            ?> 
    </section>  
    <script>
    var preloader = document.getElementById('loading');
    var del = document.getElementById('del');
    function load(){
      preloader.style.display = "none";
    }
    function dele(){
      del.style.display = "block";
    }
    function delet(){
      del.style.display = "none";
    }
    function del1(){
     document.location.href='deletevehicle.php';
    }
    
  </script>       
 <style>
.h1{
    text-align: center;
    margin-top: 50px;
    margin-left: auto;
    font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 400;
    color: #333333;

}
/* body {
    background-image: url(Img/renbg.jpg);
    height: 100vh; width: 100vw;
   background-repeat: no-repeat;
}     */
.bg {
    position: fixed;
    z-index: -99;
    opacity: 1;
    top: 0;
    margin-top: 0;
  }
  .del {
  height: 150px;
  width: 400px;
  /* border: 2px solid ; */
  border-radius: 10px;
  margin-left: 350px;
  margin-top: 170px;
  position: fixed;
  z-index: 9999;
  font-size: 20px;
  font-family: 'Ubuntu', sans-serif;
  display: none;
  background-color: #fff;
  box-shadow: 0 5px 20px rgba(104, 104, 104, 0.8);
  transition: all 1s;
  text-align: center;
 }
 .p1{margin-top: 25px;}
  /* .btn1{margin: 20px;margin-top: 60px;} */
 .del button {height: 30px;width: 60px;}
 /* .del button:hover{background-color: red;color: #fff;} */
 .btn:hover{background-color: red;color: #fff;}
 .btn1:hover{background-color: green;color: #fff;}
 .button1:hover{background-color: red;color: #fff;}
.menu-content {
  display: grid;
  grid-gap: 20px;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  justify-items: center;
}   
.sub-menu {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 1px 5px rgba(104, 104, 104, 0.8);
  width: 270px;
  height: 330px;
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
 </style>
 
</body>
</html>
<?php
}
else{
  header("location:login.php");
}
?>