<?php
require "session.php";
if($_SESSION['login']){
$conn = connect();

if(isset($_POST['submit'])){
  if($_POST['loginId']===$_SESSION['login']){
        $name = $_POST['name'];
        $loginId = $_POST['loginId'];
        $dob = date('Y-m-d', strtotime($_POST['dob']));
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];

        $sql = "UPDATE `demo`.`register`  SET  name='$name',dob='$dob',email='$email',mobile='$mobile',gender='$gender' WHERE loginId='$loginId'";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo "<script> alert('Updates Successful');
          document.location.href = 'index1.php';     
          </script>";
        }
        else{
            echo 'Something went wrong !!';
        }
    }else{
      echo "Login Id Should Be Same !!";
    }
  }

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Carpooling Website</title>
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
        <li><a href="mycars.php">MyCars</a>
        </li>
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
    <h3>MY ACCOUNT</h3>
  </div>

  <main>
  <form action="update1.php" method="post">
            <div class="heading">
                <h2>UPDATE YOUR DETAILS</h2>
            </div>
            <div class="container5">
                <div class="input-field">
                  <!-- <span><h2>UPDATE YOUR DETAILS</h2></span> -->
                    <label>Full Name</label>
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>
                <div class="input-field" class="f2">
                    <label>Login ID</label>
                    <input type="text" name="loginId" value="<?= $_SESSION['login'] ?>">
                </div>
                <div class="input-field">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" placeholder="Enter birth date" required>
                </div>
                <div class="input-field">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-field">
                    <label>Mobile Number</label>
                    <input type="number" name="mobile" placeholder="Enter mobile number" required>
                </div>
                <div class="input-field">
                    <label>Gender</label>
                    <select name="gender" required>
                        <option disabled selected>Select gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
                </div>
                <!-- <div class="input-field">
                    <label>City</label>
                    <input type="text" placeholder="Enter Your City" required>
                </div>
                <div class="input-field">
                    <label>State</label>
                    <input type="text" placeholder="Enter Your State" required>
                </div> -->
                    <button type="submit" name="submit" class="sumbit">
                        <!-- <span class="btnText">Submit</span> --> <h3>Submit</h3>
                        <i class="uil uil-navigator"></i>
                    </button>
                    <div class="p2" style="font-size: large;margin-top: 0;" >
                    <p>Note : You Cannot Change your Login Id</p>
                    </div>
            </div>
        </form>
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
  <?php
}
else{
  header("location:login.php");
}
?>
  <!-- <script>
    function clicked() {
      console.log('The icon was clicked')
    }
    menu.addEventListener('click', event => clicked())
  </script> -->
  <style>
.bg {
    position: fixed;
    z-index: -99;
    opacity: 1;
  }

.heading {
  width: 851px;
  margin-left: 330px;
  border: 2px solid rgb(0, 0, 0);
  text-align: center;
  color: #000000;
  background: linear-gradient(120deg, #90f8a4, rgb(132, 179, 196));
  margin-top: 50px;
  height: 40px;
  vertical-align: auto;
  font-size: 18px;
  font-family: "Segoe UI",Arial,sans-serif;
  font-weight: 300;
}
.input-field span {
    width: 800px;
  margin-top: 0;
  border: 2px solid rgb(0, 0, 0);
  text-align: center;
  color: #000000;
  background: linear-gradient(120deg, #90f8a4, rgb(132, 179, 196));
  margin-bottom: 50px;
  height: 40px;
  vertical-align: auto;
  font-size: 18px;
  font-family: "Segoe UI",Arial,sans-serif;
  font-weight: 300;
}
.container5 {
  height: 500px;
  width: 850px;
  margin: auto;
  /* margin-top: 50px; */
  border: 2px solid rgb(0, 0, 0);
  padding: 20px;
  box-shadow: 0 5px 10px rgba(21, 226, 14, 0.1);;
}
.container5 {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  background-color: #fff;
}
.f2 {
  margin-top: 20px;
}
.input-field{
  display: flex;
  width: calc(100% / 2 - 15px);
  flex-direction: column;
  margin: 4px 0;
}
.input-field label{
  font-size: 18px;
  font-weight: 500;
  color: #2e2e2e;
}
.input-field input {
  outline: none;
  font-size: 14px;
  font-weight: 400;
  color: #333;
  border-radius: 5px;
  border: 1px solid #aaa;
  padding: 0 15px;
  height: 42px;
  margin: 8px 0;
}
.input-field select {
  outline: none;
  font-size: 14px;
  font-weight: 400;
  color: #333;
  border-radius: 5px;
  border: 1px solid #aaa;
  padding: 0 15px;
  height: 42px;
  margin: 8px 0;
}
.container5 button{
  font-size: 20px;
  height: 45px;
  /* max-width: 200px; */
  width: 100%;
  border: none;
  outline: none;
  color: #000000;
  border-radius: 5px;
  margin: 25px 0;
  background: linear-gradient(120deg, rgb(132, 179, 196), #90f8a4);
  transition: all 0.3s linear;
  cursor: pointer;
}
.container5 button:hover{
  background: linear-gradient(120deg, #90f8a4, rgb(132, 179, 196));
}
@media (max-width: 750px) {
    .container5 form{
        overflow-y: scroll;
    }
    .container5 form::-webkit-scrollbar{
       display: none;
    }
    form .fields .input-field{
        width: calc(100% / 2 - 15px);
    }
}

@media (max-width: 550px) {
    form .fields .input-field{
        width: 100%;
    }
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
 
  .progress{
  
    height: 3px;
    z-index: 999;
    background-color: red;
    animation: load 1s ease-in-out 1;
   position: fixed;
  }
  @keyframes load {
    0%{
      width: 0;
    }
    50%{
      width: 80vw;
    }
    100%{
      width: 100vw;
    }
  }
  /* Style the header */
  header {
    background-color: grey;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    /* position: fixed; */
    top: 0;
    left: 0;
    width: 100%;
    z-index: 998;
    height: 60px;
  }
  
  /* Style the navigation menu */
  nav {
    display: flex;
    align-items: center;
    margin-top: 0;
    padding: 1rem;
    height: 60px;
  }
  
  .ul {
    display: flex;
    list-style: none;
    padding: 0px;
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
  nav ul ul {
    display: none;
    top: 60px;
    position: absolute;
    background-color: #fff;
  }
nav ul li:hover > ul{
  display: block;
}  
nav ul ul li {
  list-style: none;
  width: 100px;
  color: #000000;
  float: none;
  display: list-item;
  position: relative;
}
nav ul ul li a {
  color: #000000;
  text-decoration: none;
  margin-left: 1px;
}
  .dash {
    width: 100%;
    height: 60px;
    background: linear-gradient(120deg, rgb(132, 179, 196), #90f8a4);
    color: #000000;
  }
  .dash h3 {
    font-size: 25px;
    font-weight: 500;
    padding: 18px;
    padding-left: 200px;
    font-family: 'Ubuntu', sans-serif;
  }
  .box {
    display: flex;
    justify-content: center;
    flex-direction: row;
    margin-top: 50px;
  }
  .add {
    height: 200px;
    width: 200px;
    border: 2px solid black;
    margin: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 5px;
    
  }
  .inbox {
    height: 150px;
    width: 150px;
    background-color: #219939;
    color: #fff;
    border-radius: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    font-size: 20px;
    font-weight: 600;
    font-family: 'Ubuntu', sans-serif;
  }
  .inbox:hover{
    font-size: 22px;
    font-weight: 700;
    transition: all .3s;
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
  .about {
    height: 350px;
    width: 23%;
    /* border: 2px solid white; */
    margin: 5px;
    margin-left: 65px;
    margin-right: 65px;
    font-weight: 400;
    font-family: 'Ubuntu', sans-serif;
    transition: all 1s;
  }
  .about h3 {
    font-size: 30px;
  }
  .info, .ul li {
    margin: 20px;
    font-size: 20px;
  }
  .about p {
    margin: 20px;
    font-size: 18px;
  }
  .ul{
    padding: 20px;
  }
   @media (max-width: 1280px){
    nav ul li a{
      width: 120px;
      transition: .2s;
    }
    .login{
      margin-left: 50px;
      transition: .9s;
    }
  } 
   @media (max-width: 850px) {
    .menu{
      display: block;
    }
    nav ul li a{
       display: none; 
      transition: 0.6s;
    } 
    .login{
      transition: .9s;
    }
    nav ul{
      position: absolute;
      top: 10%;
      right: 2%;
      height: 29vh;
      width: 270px;
      background-color: #29fd53;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      border-radius: 10px;
      transition: all .50s ease;
    }
  } 
  
  /* Style the main content section */
  .main-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
  }
  
  /* Style the main content heading */
  .main-content h2 {
    font-size: 2.5rem;
    margin-bottom: 2rem;
  }
  
  /* Style the main content paragraph */
  .main-content p {
    font-size: 1.2rem;
    line-height: 1.5;
    margin-bottom: 2rem;
  }
   
  /* Style the footer */
  footer {
    background: linear-gradient(120deg, #90f8a4, rgb(132, 179, 196));
    color: #000000;
    text-align: center;
    padding: 2rem;
    margin-top: 50px;
  }
  
  footer p {
    font-size: 1.2rem;
    margin-bottom: 1rem;
  }
  
  </style>
</body>
</html>