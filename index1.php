<?php 
// mysqli_connect() function opens a new connection to the MySQL server.
require 'session.php';
if($_SESSION['login']){

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

<body onload="load()">
<div id="loading">
</div>
<!-- <div class="progress"></div> -->
  <header>
    <nav>
      <ul class="ul">
        <li><a href="index1.php">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="findride1.php">Find a Ride</a></li>
        <li><a href="offerride1.php">Offer a Ride</a></li>
        <li><a href="index1.php">Dashboard</a></li>
        <li><a href="mycars.php">MyVehicles</a>
        </li>
        <!-- <li><a href="#">My Administration</a></li> -->
      </ul>
      <div class="login">
      <div class="welcome">
        <a href="#" onmouseenter="side()" onmouseup="side1()">Welcome <?= $login_session ?> </a>
        </div>
        <a href="logout.php">LogOut <img src="Img/user-fill.png" class="user"></img></a>
        
      </div>
    </nav>
  </header>
  <img class="bg" style="height: 100vh; width: 100vw;" src="Img/renbg.jpg" alt="Image">

  <div class="sidebar" id="side" >
    <div class="userimg">
      <img class="abimg" src="Img/p5.jpg" alt="Niraj">
    </div>
    <h2>Hellow <?= $login_session ?> </h2>
  </div>
  <div class="dash">
    <h3>DASHBOARD</h3>
  </div>
  <div class="del" id="del">
      <div class="p1" >
          <p>Are you sure you want to delete your account?</p>
      </div>
      <button type="submit" name="yes" onclick="del1()" class="btn" class="btn2"> 
          <span class="btnText">Yes</span>             
      </button>
      <button type="submit" name="no" onclick="delet()" class="btn" class="btn2"> 
          <span class="btnText">No</span>
      </button>
  </div>
  <div class="can" id="cancel">
      <div class="p1" >
          <p>Edit Your Ride As : </p>
      </div>
      <button type="submit" name="yes" onclick="cancel1()" class="btn1"> 
          <span class="btnText">Driver</span>             
      </button>
      <button type="submit" name="no" onclick="cancel2()" class="btn1"> 
          <span class="btnText">Customer</span>
      </button>
      <button type="submit" name="no" onclick="cancel3()" class="btn1"> 
          <span class="btnText">None</span>
      </button>
  </div>
  <main>

    <div class="box">
      <div class="add">
        <a href="addcar1.php"><div class="inbox"><div class="text">Add My</div> Vehicle</div></a>
      </div>
      <div class="add">
        <a href="mybookings.php"><div class="inbox"><div class="text">My</div> Bookings</div></a>
      </div>
      <div class="add">
        <a href="customerbookings.php"><div class="inbox"><div class="text">Customer</div>Bookings</div></a>
      </div>
      <div class="add">
        <a href="update1.php"><div class="inbox"><div class="text">Update</div>Account</div></a>
      </div>
      <div class="add" >
        <a href="#" onclick="cancel()"><div class="inbox"><div class="text">Edit</div> Rides</div></a>
      </div>
      <div class="add">
        <a href="change.php"><div class="inbox"><div class="text">Change</div>Password</div></a>
      </div>
      <div class="add" >
        <a href="#" onclick="dele()"><div class="inbox"><div class="text">Delete</div> Account</div></a>
      </div>
     
    </div>
    <section class="section">
      <div class="box2">
        <div class="about">
          <h3>CONTACT INFO</h3>
          <span class="spn"></span>
          <div class="info">Address:Nashik,Maharashtra</div>
        <div class="info">City:Nashik</div>
        <div class="info">Phone :0253-2354774</div>
        <div class="info">Mobile:8983493829</div>
        <div class="info">Email :roadbuddies50@gmail.com</div>
        </div>
        <div class="about">
          <h3>MODULES</h3>
          <span class="spn"></span>
          <div class="ul"><ul type="">
          <li>Booking Module</li>
          <li>User Module</li>
          <li>Car Search Module</li>
          <li>Login Module</li>
        </ul></div>
        </div>
        <div class="about" id="about">
          <H3>ABOUT CARPOOLING</H3>
          <span class="spn"></span>
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
}
else{
  header("location:login.php");
}
?>
  <script>
    var preloader = document.getElementById('loading');
    var sidebar = document.getElementById('side');
    var del = document.getElementById('del');
    var can = document.getElementById('cancel');
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
     document.location.href='delete.php';
    }
    function cancel(){
      can.style.display = "block";
    }
    function cancel1(){
     document.location.href='drivercancel.php';
    }
    function cancel2(){
     document.location.href='cust_cancel.php';
    }
    function cancel3(){
      can.style.display = "none";
    }
    // function side(){
    //   sidebar.style.display = "block";
    // }
    // function side1(){
    //   sidebar.style.display = "none";
    // }
  </script>
  <style>
.bg {
    position: fixed;
    z-index: -99;
    opacity: 1;
  }
#loading {
  position: fixed;
  width: 100%;
  height: 100vh;
  background: #fff 
  url('https://miro.medium.com/v2/resize:fit:1400/1*CsJ05WEGfunYMLGfsT2sXA.gif')
  no-repeat center ;
  z-index: 999;
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  .spn {
    height: 10px;
    width: 100px;
    background-color: #fff;
  }
  .del {
  height: 150px;
  width: 400px;
  /* border: 2px solid ; */
  border-radius: 10px;
  margin-left: 550px;
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
  .btn1{margin: 20px;margin-top: 60px;}
 .del button {height: 30px;width: 60px;}
 /* .del button:hover{background-color: red;color: #fff;} */
 .btn:hover{background-color: red;color: #fff;}

 .can {
  height: 200px;
  width: 400px;
  /* border: 2px solid ; */
  border-radius: 10px;
  margin-left: 550px;
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
 .can button {height: 35px;width: 80px;margin: 20px;margin-top: 60px;}
 .can button:hover{background-color: red;color: #fff;}
 .btn1:hover{background-color: green;color: #fff}
.btn{margin: 20px;}
 .btn2{margin: 20px;}
 .sidebar {
  height: 100vh;
  width: 400px;
  border: 2px solid red;
  margin-left: 1150px;
  position: fixed;
  z-index: 9999;
  display: none;
  float: right;
  background-color: #fff;
  transition: all 1s;
  text-align: center;
 }
 .abimg {
  border: 3px solid blueviolet;
  border-radius: 100%;
  width: 100px;
  height: 100px;
  margin-top: 50px;
}
 /* .sidebar:hover{
  display: block;
 } */

  .progress{
  margin-top: 0;
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
    position: fixed;

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
  position: absolute;
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
   /* position: absolute; */
   display: block;
   margin-top: 50px;
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
    /* position: absolute; */

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
    background-color: #fff;
    
  }
  .inbox {
    height: 150px;
    width: 150px;
    background: linear-gradient(120deg, rgb(132, 179, 196), #90f8a4);
    color: #000000;
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
    /* position: absolute; */
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
  
  
  /* Style the hero section */
  .hero-section {
    /* margin-left: 200px; */
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-image: url("path/to/hero-image.jpg");
    background-size: cover;
    background-position: center;
    color: #fff;
    text-align: center;
  }
  .hero-section h1 {
    color: #000000;
    font-size: 4rem;
    margin-bottom: 2rem;
  }
  .hero-section p {
    color: #000000;
    font-size: 1.5rem;
    margin-bottom: 2rem;
  }
  .hero-section form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .hero-section form input {
    padding: 1rem;
    border: none;
    border-radius: 5px;
    margin: 0.5rem;
    width: 100%;
    max-width: 400px;
    font-size: 1.2rem;
  }
  .hero-section form input[type="date"] {
    padding: 1rem;
    border: none;
    border-radius: 5px;
    margin: 0.5rem;
    width: 100%;
    height: 400px;
    font-size: 1.2rem;
  }
  .hero-section form input[type="submit"] {
    background-color: #0077cc;
    color: #fff;
    padding: 1rem 2rem;
    border: none;
    border-radius: 5px;
    margin: 0.5rem;
    font-size: 1.2rem;
    cursor: pointer;
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
  /* Style the call-to-action section */
  .cta-section {
    background-color: #0077cc;
    color: #fff;
    text-align: center;
    padding: 4rem 2rem;
  }
  .cta-section h2 {
    font-size: 2.5rem;
    margin-bottom: 2rem;
  }
  .cta-section p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
  } 
  .cta-section a {
    background-color: #fff;
    color: #0077cc;
    padding: 1rem 2rem;
    border-radius: 5px;
    text-decoration: none;
    font-size: 1.2rem;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
  }
  .cta-section a:hover {
    background-color: #0077cc;
    color: #fff;
  }
  /* Style the footer */
  footer {
    margin-top: 50px;
    background: linear-gradient(120deg, rgb(132, 179, 196), #73f3ff);
    color: #000000;
    text-align: center;
    padding: 2rem;
    /* height: 70px; */
    /* position: absolute; */

  }
  
  footer p {
    font-size: 1.2rem;
    margin-bottom: 1rem;
  }
  
  footer a {
    color: #000000;
    text-decoration: none;
    font-size: 1.2rem;
    transition: color 0.3s ease-in-out;
  }
  
  footer a:hover {
    color: #0077cc;
  }
  </style>
