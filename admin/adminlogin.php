<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

require "connection.php";
$con=connect();
if(isset($_POST["submit"])){  
  if(!empty($_POST['loginId1']) && !empty($_POST['password1'])) {  
      $loginId1 = $_POST['loginId1'];  
      $password1 = $_POST['password1'];  
    
      $result = "SELECT * FROM admin1 WHERE loginId ='$loginId1' AND password ='$password1'";
      $query = mysqli_query($con, $result); 
      if($query){ 
      if(mysqli_num_rows($query))  
      {  
        while($row = mysqli_fetch_assoc($query)){
          $login = $row['loginId'];
          $pass = $row['password'];}
      // $row = mysqli_fetch_assoc($query);
      // if($row['loginId']===$loginId1 && $row['password']===$password1){
      if($login===$loginId1 && $pass===$password1){
        $_SESSION['login1']=$loginId1;  
        $_SESSION['password1']=$password1;
        echo "<script> 
             document.location.href = 'admin.php';     
             </script>";
      }
      else{
       echo "<script> alert('Incorrect username or password')
              </script>";
      }
    }
  }
      else{
        echo "<script> alert('Something Went Wrong');
        document.location.href = 'adminlogin.php';     
        </script>";
      }

    }
 
  }  

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="CSS/login.css">
  </head>
  <body>
    <div class="progress"> 
    </div>
    <img class="bg" style="height: 100vh; width: 100vw;" src="Img/renbg.jpg" alt="Image">
    <div class="center">
      <h1>Admin LogIn</h1>
      <form action='adminlogin.php' method="post">
        <div class="txt_field">
          <input type="text" name="loginId1" id="loginId1" required>
          <span></span>
          <label for="username">Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password1" id="password1" required>
          <span></span>
          <label for="password">Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" name="submit" id="submit" value="Submit" > 

        <div class="signup_link">
        </div>
      </form>
    </div>
  </body>
</html>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.bg {
  position: absolute;
  z-index: -1;
  opacity: 1;
}
body {
  margin: 0;
  padding: 0;
  background: linear-gradient(120deg, #29fd53, #90f8a4);
  height: 100vh;
  overflow: hidden;
}

.center {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  background: white;
  border-radius: 10px;
  box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
}

.center h1 {
  text-align: center;
  padding: 20px 0;
  border-bottom: 1px solid silver;
}

.center form {
  padding: 0 40px;
  box-sizing: border-box;
}

form .txt_field {
  position: relative;
  border-bottom: 2px solid #adadad;
  margin: 30px 0;
}

.txt_field input {
  width: 100%;
  padding: 0 5px;
  height: 40px;
  font-size: 16px;
  border: none;
  background: none;
  outline: none;
}

.txt_field label {
  position: absolute;
  top: 50%;
  left: 5px;
  color: #adadad;
  transform: translateY(-50%);
  font-size: 16px;
  pointer-events: none;
  transition: .5s;
}

.txt_field span::before {
  content: '';
  position: absolute;
  top: 40px;
  left: 0;
  width: 0%;
  height: 2px;
  background: #2691d9;
  transition: .5s;
}

.txt_field input:focus~label,
.txt_field input:valid~label {
  top: -5px;
  color: #2691d9;
}

.txt_field input:focus~span::before,
.txt_field input:valid~span::before {
  width: 100%;
}

.pass {
  margin: -5px 0 20px 5px;
  color: #a6a6a6;
  cursor: pointer;
}

.pass:hover {
  text-decoration: underline;
}

input[type="submit"] {
  width: 100%;
  height: 50px;
  border: 1px solid;
  background: #2691d9;
  border-radius: 25px;
  font-size: 18px;
  color: #e9f4fb;
  font-weight: 700;
  cursor: pointer;
  outline: none;
}

input[type="submit"]:hover {
  border-color: #2691d9;
  transition: .5s;
}

.signup_link {
  margin: 30px 0;
  text-align: center;
  font-size: 16px;
  color: #666666;
}

.signup_link a {
  color: #2691d9;
  text-decoration: none;
}

.signup_link a:hover {
  text-decoration: underline;
}
.search {
  padding: 5px;
  margin-bottom: 10px;
  width: 100%;
  height: 50px;
  border: 1px solid;
  background: #29fd53;
  border-radius: 25px;
  font-size: 18px;
  color: #e9f4fb;
  font-weight: 700;
  cursor: pointer;
  outline: none;
  text-align: center;
} 
.search a{
  text-decoration: none;
  font-size: 25px;
  color: #e9f4fb;
  font-weight: 700;
}
.search:hover{
  border-color: #29fd53;
  transition: .5s;
}

.progress {

  height: 3px;
  background-color: red;
  animation: load 1s ease-in-out 1;

}

@keyframes load {
  0% {
    width: 0;
  }

  50% {
    width: 80vw;
  }

  100% {
    width: 100vw;
  }
}
</style>