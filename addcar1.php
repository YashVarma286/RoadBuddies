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
    <title>Add My Car</title>
    <link rel="stylesheet" href="CSS/index1.css" />

</head>
<img class="bg" style="height: 100vh; width: 100vw;" src="Img/renbg.jpg" alt="Image">
<body>
<div class="progress">
  </div>
  <header>
    <nav>
      <ul class="ul">
        <li><a href="index1.php">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="findride1.php">Find a Ride</a></li>
        <li><a href="offerride1.php">Offer a Ride</a></li>
        <li><a href="index1.php">Dashboard</a></li>
        <li><a href="mycars.php">MyCars</a></li>
        <!-- <li><a href="#">My Administration</a></li> -->
      </ul>
      <div class="login">
        <a href="index.php">LogOut <img src="Img/user-fill.png" class="user"></img></a>
        <div class="welcome">
        <a href="#">Welcome <?= $login_session ?> </a>
        </div>
      </div>
    </nav>
  </header>
  <div class="dash">
    <h3>ADD MY VEHICLE</h3>
  </div>
    <main>
    <div class="form">
        <div class="formlabel">
            <label for="">Vehicle Name</label>
            <label for="">Vehicle Number</label>
            <!-- <label for="">From Location</label>
            <label for="">To Location</label> -->
            <label for="">Vehicle Type</label>
            <label for="">Company Name</label>
            <label for="">Vehicle Image</label>
            <label for="">Description</label>
        </div>
 
         <form action="addcar1.php" method="post" enctype="multipart/form-data">
                <div class="details">
                    <div class="fields">
                        <div class="inputfield">
                            <input type="text" placeholder="Vehicle Name" name="cname" required>
                        </div>
                        <div class="inputfield">
                            <input type="text" placeholder="Vehicle Number" name="cno" required>
                        </div>
                        <div class="inputfield">
                            <!-- <input type="text" placeholder="Vehicle Type" name="ctype" required> -->
                           
                            <select name="ctype"  required>
                              <option disabled selected>Vehicle Type</option>
                              <option>Two Wheeler</option>
                              <option>SUV</option>
                              <option>MPV</option>
                              <option>Sedan</option>
                              <option>Hatch Back</option>         
                          </select>
                        </div>
                        <div class="inputfield">
                            <input type="text" placeholder="Company Name" name="comname" required>
                        </div>
                        
                         <div class="inputfield">
                            <input type="file" name="choosefile" placeholder="Vehicle Image" value="" required />
                        </div> 
                        <div class="inputfield">
                            <textarea placeholder="Vehicle Description" rows="9" cols="21" name="cdesc" required></textarea>
                        </div>
                        <button type="submit" name="uploadfile" class="sumbit"> 
                            <span class="btnText">SUBMIT</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
        </form>
    </div>
    <section class="section">
      <div class="box2">
        <div class="about">
          <h3>CONTACT INFO</h3>
          <div class="info">Address:Nashik,Maharashtra</div>
        <div class="info">City:Nashik</div>
        <div class="info">Phone :0253-2354774</div>
        <div class="info">Mobile:8983493829</div>
        <div class="info">Email :roadbuddies@gmail.com</div>
        </div>
        <div class="about">
          <h3>MODULES</h3>
          <div class="ul"><ul type="">
          <li>Booking Module</li>
          <li>User Module</li>
          <li>Car Search Module</li>
          <li>Login Module</li>
        </ul></div>
        </div>
        <div class="about" id="about">
          <H3>ABOUT CARPOOLING</H3>
          <p>A car pooling hire car, or car hire agency is a company that rents automobiles for short periods of
            time,generally ranging from a few hours to few weeks.It if often organized with numerous local branches which
            allow user to return a vehicle to different location, and primarily located near airports or busy city areas and
            often complemented by a website allowing online reservations.</p>
        </div>
      </div>
    </section>
    </main>
    <footer>
    <p>&copy; 2023 Carpooling Website</p>
  </footer>
</body>
</html>

<?php
$db = connect();
$msg = ""; 

if (isset($_POST['uploadfile'])) {
    $cname = $_POST['cname'];
    $cno = $_POST['cno'];
    $ctype = $_POST['ctype'];
    $comname = $_POST['comname'];
    $loginId = $_SESSION['login'];  
    $filename = $_FILES["choosefile"]["name"];
    $tempname = $_FILES["choosefile"]["tmp_name"];  
        $folder = "image/".$filename; 
    $cdesc = $_POST['cdesc'];  
    $q1 = "SELECT * FROM addcar";
    $dqr = mysqli_query($conn,$q1);
    $flag = true;
    if(mysqli_num_rows($dqr) > 0) {
        while($row = mysqli_fetch_assoc($dqr)){
            $acno = $row["cno"];
            // $auser = $row["loginid"];
            if($cno===$acno ){
                $flag = false;
            }
        }
        if($flag === true){    
 
        $sql = "INSERT INTO addcar (cname,cno,ctype,comname,filename,cdesc,loginid) VALUES ('$cname','$cno', '$ctype', '$comname', '$folder', '$cdesc', '$loginId')";
        // function to execute above query
        mysqli_query($db, $sql);       
        // Add the image to the "image" folder"
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script> alert('Vehicle Added Successful');
            document.location.href = 'index1.php';      
             </script>";
        }else{
            echo "Something went wrong <br> OR Try To Enter Correct Car Number";
            $msg = "Failed to upload image";
    }
}else{
  echo "<script> alert('Car Number already exists!');
  document.location.href = 'addcar1.php';      
   </script>";
}
}
}
?>
  <?php
}
else{
  header("location:login.php");
}
?>

<style>
 .progress {
    position: fixed;
  }
  /* .progress {
    margin-bottom: 60px;
  } */

.bg {
    position: fixed;
    z-index: -99;
    opacity: 1;
    top: 0;
  }
.header, nav {
    background-color: grey;
  }
.formlabel {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    /* border: 2px solid yellow; */
    height: 400px;
    width: 200px;
    margin-top: 0;
    margin-right: 20px;
}
.formlabel label {
    margin-top: 30px;
    font-family: 'Ubuntu', sans-serif;
    font-size: 19px;
}
.form {
    display: flex;
    align-items: center;
    justify-content: center;
    /* margin: 100px auto; */
    box-shadow: 10px 10px 15px rgba(235, 4, 4, 0.05);
    /* border: 2px solid black; */
    height: 600px;
}
.form input[type="file"]{
  background-color: #fff;
}
.details {
    height: 520px;
    width: 700px;
    /* border: 2px solid red; */
    margin-top: 170px;
    padding: 20px;
}
.inputfield input, textarea, select {
    width: 100%;
    margin-top: 13px;
    padding: 10px;
    height: 40px;
    font-size: 16px;
    border: none;
    border: 1px solid black;
    outline: none;
}
.details button {
    background-color: #0e8feb;
    color: white;
    height: 30px;
    width: 100px;
    margin-left: 50px;
    margin-top: 10px;
    border-radius: 5px;
    outline: none;
}
nav ul li {
    display: block;
    font-size: 15px;
    width: 90px;
    font-family: 'Ubuntu', sans-serif;
  }
  
  nav ul li a {
    display: flex;
    text-decoration: none;
    color: #fff;
    width: 170px;
    padding: 0px;
    justify-content: center;
  }
  .login a{
    display: flex;
    text-decoration: none;
    color: #fff;
    width: 90px;
    justify-content: center;
    font-size: 18px;
    font-family: 'Ubuntu', sans-serif;
  }
  .welcome a {
    width: 200px;
  }
  .login img {
    color: #29fd53;
    height: 20px;
    margin-left: 5px;
  }
  .login a:hover{
    font-size: 17.5px;
    text-decoration: underline;
    color: skyblue;
    font-weight: 500;
    transition: all ease-in .1s;
  }
  .login{
    display: flex;
    flex-direction: row;
    margin-left: 300px;
    padding: 30px;
  }
  nav ul li a:hover{
    font-size: 19px;
    text-decoration: underline;
    color: skyblue;
    font-weight: 500;
    transition: all ease-in .1s;
  }
  .user{
    background-color: #29fd53;
    border-radius: 5px;
    height: 24px;
    width: 19px;
  }
  .dash {
    width: 100%;
    height: 60px;
    background: linear-gradient(120deg, rgb(132, 179, 196), #90f8a4);
    color: #000000;
    /* margin-top: 60px; */
  }
  .box2 {
    margin-top: 100px;
    background: linear-gradient(120deg, rgb(132, 179, 196), #90f8a4);
    color: #000000;
    width: 100%;
    height: 400px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }
  footer {
    margin-top: 50px;
    background: linear-gradient(120deg,  #90f8a4, rgb(132, 179, 196));
    color: #000000;
    text-align: center;
    padding: 2rem;
  }
</style>