<?php
require "session.php";
if($_SESSION['login']){
$conn = connect();

if(isset($_POST['submit'])){

        $loginId = $_SESSION['login'];
        $oldpass1 = $user_pass;
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $conpass = $_POST['conpass'];
        
if($oldpass===$oldpass1){
    if($newpass===$conpass) {
        $sql = "UPDATE `demo`.`register`  SET  password='$newpass' WHERE loginId='$loginId'";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo "<script> alert('Updates Successful');
          document.location.href = 'index1.php';     
          </script>";
        }
        else {
            echo 'Something went wrong !!';
        }
    }
    else {
        echo "<script> alert('New Password And Confirm Password Didn't Match');
          document.location.href = 'index1.php';     
          </script>";
    }
}
    else{
        echo "<script> alert('Old Password Does not Match');
          document.location.href = 'change.php';     
          </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Change Password</title>
    <link rel="stylesheet" href="CSS/index1.css" />
</head>
<img class="bg" src="Img/renbg.jpg" alt="Image">
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
        <h3>CHANGE PASSWORD</h3>
    </div>

    <main>
        <div class="container1">
            <form action="change.php" method="post">
                <div class="change">
                    <div class="centre">
                        <span class="title">
                            <h2>Change Your Password</h2>
                        </span>
                        <input type="password" placeholder="Enter Old Password" id="password" name="oldpass" required>
                    </div>
                    <div class="centre">
                        <input type="password" placeholder="Enter New Password" id="password1" name="newpass" required>
                    </div>
                    <div class="centre">
                        <input type="password" placeholder="Confirm New Password" id="password2" name="conpass" required>
                    </div>
                    <button class="submit" name="submit" value="Submit">
                        <!-- <span class="btnText">SUBMIT</span> --> <h3>Submit</h3>
                        <i class="uil uil-navigator"></i>
                    </button>
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
                    <div class="ul">
                        <ul type="">
                            <li>Booking Module</li>
                            <li>User Module</li>
                            <li>Car Search Module</li>
                            <li>Login Module</li>
                        </ul>
                    </div>
                </div>
                <div class="about" id="about">
                    <H3>ABOUT CARPOOLING</H3>
                    <p>A car pooling hire car, or car hire agency is a company that rents automobiles for short periods
                        of
                        time,generally ranging from a few hours to few weeks.It if often organized with numerous local
                        branches which
                        allow user to return a vehicle to different location, and primarily located near airports or
                        busy city areas and
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
}
else{
  header("location:login.php");
}
?>
<style>
    .progress {
        position: fixed;
    }
    .bg {
    position: fixed;
    z-index: -99;
    opacity: 1;
    height: 100vh; width: 100vw;
  }
    .header, nav {
    background-color: grey;
  }
    .container1 {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 100px auto;
        box-shadow: 10px 10px 15px rgba(235, 4, 4, 0.05);
        border: 2px solid green;
        border-radius: 5px;
        height: 240px;
        width: 601px;
        background-color: #fff;
    }

    .change {
        width: 601px;
        height: 240px;
    }

    .container1 span {
        display: block;
        text-align: center;
        padding: 5px;
        background: linear-gradient(120deg, #90f8a4, rgb(132, 179, 196));
        color: black;
        width: 100%;
        height: 60px;
        padding-top: 15px;
    }

    .centre input,
    textarea {
        width: 100%;
        padding: 10px;
        height: 60px;
        font-size: 16px;
        border: none;
        border: 1px solid black;
    }

    .container1 button {
        padding-top: 10px;
        width: 100%;
        height: 60px;
        border: 1px solid;
        background: linear-gradient(120deg, #90f8a4, rgb(132, 179, 196));
        font-size: 18px;
        color: #000000;
        font-weight: 700;
        cursor: pointer;
    }
    .container1 button:hover{
  background: linear-gradient(120deg, rgb(132, 179, 196), #90f8a4);
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
  .dash {
    width: 100%;
    height: 60px;
    background: linear-gradient(120deg, rgb(132, 179, 196), #90f8a4);
    color: #000000;
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
    background: linear-gradient(120deg, #90f8a4, rgb(132, 179, 196));
    color: #000000;
    text-align: center;
    padding: 2rem;
    margin-top: 50px;
  }
</style>