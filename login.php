<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

require "connection.php";
$con=connect();
if(isset($_POST["submit"])){  
  if(!empty($_POST['loginId1']) && !empty($_POST['password1'])) {  
      $loginId1 = $_POST['loginId1'];  
      $password1 = $_POST['password1'];  
    
      $result = "SELECT * FROM register WHERE loginId ='$loginId1' AND password ='$password1'";
      $query = mysqli_query($con, $result); 
      if($query){
      if(mysqli_num_rows($query) === 1)  
      {  
        while($row = mysqli_fetch_assoc($query)){
          $login = $row['loginId'];
          $pass = $row['password'];}
      // $row = mysqli_fetch_assoc($query);
      // if($row['loginId']===$loginId1 && $row['password']===$password1){
      if($login===$loginId1 && $pass===$password1){
        $_SESSION['login']=$loginId1;  
        $_SESSION['password']=$password1;
        echo "<script> 
             document.location.href = 'index1.php';     
             </script>";
      }
      else{
       echo "<script> alert('Incorrect username or password');
       document.location.href = 'login.php';
              </script>";
      }
    }
  }
      else{
        echo "<script> alert('Something Went Wrong');
        document.location.href = 'index.php';     
        </script>";
      }

    }
 
  }  

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="CSS/login.css">
  </head>
  <body>
    <div class="progress"> 
    </div>
    <img class="bg" style="height: 100vh; width: 100vw;" src="Img/renbg.jpg" alt="Image">
    <div class="center">
      <h1>Log In</h1>
      <form action='login.php' method="post">
        <div class="txt_field">
          <input type="text" name="loginId1" id="loginId1" required>
          <span></span>
          <label for="username">Login Id</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password1" id="password1" required>
          <span></span>
          <label for="password">Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" name="submit" id="submit" value="Submit" > 

        <!-- <div class="search">
          <a href="index1.php" >Login</a>
        </div> -->
        <div class="signup_link">
          Not a member? <a href="registration.php">Signup</a>
        </div>
      </form>
    </div>
    <script>
      function auth(){
        // var username = document.getElementById('loginId').value;
        // var password = document.getElementById('password').value;
        // if(loginId == 'loginId' && password == 1234){
          window.location.assign("index1.php");
          alert("Login Successful");
      //   }
      //   else{
      //     alert("Invalid Information");
      //     return;
      //   }
      }
    </script>
  </body>
</html>
