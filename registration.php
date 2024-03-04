<?php
require "connection.php";
$conn = connect();
$hasDigit = false;
$hasSpecialChar = false;
$hasUppercase = false;
$hasLowercase = false;
if(isset($_POST['submit'])){

    if(isset($_POST['name']) && isset($_POST['loginId']) && isset($_POST['email'])&& isset($_POST['mobile'])&& isset($_POST['gender'])&& isset($_POST['password'])&& isset($_POST['conpass'])){

        
        $name = $_POST['name'];
        $loginId = $_POST['loginId'];
        $dob = date('Y-m-d', strtotime($_POST['dob']));
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $conpass = $_POST['conpass'];

        if (preg_match("/[0-9]/", $password)) {
            $hasDigit = true;
        }
        if (preg_match("/[^A-Za-z0-9]/", $password)) {
            $hasSpecialChar = true;
        }
        if (preg_match("/[A-Z]/", $password)) {
            $hasUppercase = true;
        }
        if (preg_match("/[a-z]/", $password)) {
            $hasLowercase = true;
        }

        if ($hasDigit && $hasSpecialChar && $hasUppercase && $hasLowercase) {
        $reg = "SELECT email FROM register";
        $res = mysqli_query($conn,$reg);
        if($res){
            $flag = true;
            if(mysqli_num_rows($res) > 0) {
                while($row1 = mysqli_fetch_assoc($res)){
                    $logid = $row1["email"];
                    if($logid===$email)
                    $flag = false;
                }}
                    //echo $logid;
            // if($logid!=$email)
            if($flag === true){     
        if($password===$conpass){
        $sql = "INSERT INTO `demo`.`register` (`name`, `loginId`, `dob`, `email`, `mobile`, `gender`, `password`) VALUES ('$name', '$loginId', '$dob', '$email', '$mobile', '$gender', '$password')";

        $query = mysqli_query($conn,$sql);
        if($query){
            $email1 = $email;
            mail($email1,"Registration Successful","Thank You for Registering !");
            // echo "Sign Up Successfull !";
            echo "<script> alert('Sign Up Successfull !');
             document.location.href = 'index.php';     
             </script>";
        }
        else{
            echo "<script> alert('Login Id ALready In Use!!');
             document.location.href = 'registration.php';     
             </script>";
        }
    }else{
        // echo $logid;
        // echo "password issue";
        echo "<script>
         alert('Password and Confirm Password Not Matched');
             document.location.href = 'registration.php';     
             </script>";
    }
}else {
    echo "<script> alert('Email Id Already In Use !!');
             document.location.href = 'registration.php';     
             </script>";
}
    }
}else {
    echo "<script> alert('Password should contain atleast one digit, uppercase, lowercase and a special character !!');
             document.location.href = 'registration.php';     
             </script>";
}
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="CSS/register.css"> -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Regisration Form </title> 
</head>
<body>
<img class="bg" style="height: 100vh; width: 100vw;" src="Img/renbg.jpg" alt="Image"> 
    <div class="container">
        <header>Registration</header>

        <form action="registration.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" name="name" required>
                        </div>
                        <div class="input-field">
                            <label>Login ID</label>
                            <input type="text" placeholder="Create your login id" name="loginId" required>
                        </div>


                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" id="date" placeholder="Enter birth date" name="dob" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" placeholder="Enter your email" name="email" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" min=1000000000 max=9999999999 placeholder="Enter mobile number" name="mobile" required>
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

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" min=898798354 pattern="/^[a-zA-Z0-9!@#\$%\^\&*_=+-]{8,12}$/g" placeholder="password" name="password" required>
                        </div>
                        <div class="input-field">
                            <label>Confirm Password</label>
                            <input type="password" placeholder="password" name="conpass" required>
                        </div>
                            <button type="submit" class="sumbit" name="submit">
                                <span class="btnText">Submit</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        <div class="register-link">
                            Already a member? <a href="login.php">Log In</a>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <script>
      var dtToday = new Date();
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear()-18;
      if(month < 10)
        month = '0' + month.toString();
      if(day < 10)
        day = '0' + day.toString();
      var maxDate = year + '-' + month + '-' + day;
      document.getElementById("date").setAttribute('max', maxDate)
  </script>
<style>
/* .submit {
    background-color: #4070f4;
    color: #fff;
} */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    /* background: #4070f4; */
}
.bg {
    position: absolute;
    z-index: -1;
    opacity: 1;
  }
.container{
    position: relative;
    max-width: 900px;
    width: 100%;
    border-radius: 6px;
    padding: 30px;
    margin: 0 15px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    height: 630px;
}
.container header{
    margin-left: 350px;
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}
.container header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: #4070f4;
}
.container form{
    position: relative;
    margin-top: 16px;
    min-height: 490px;
    background-color: #fff;
    /* overflow: hidden; */
}
.container form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}
.container form .form.second{
    opacity: 0;
    pointer-events: none;
    transform: translateX(100%);
}
form.secActive .form.second{
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
}
form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.container form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 18px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.container form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
form .fields .input-field{
    display: flex;
    width: calc(100% / 2 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 16px;
    font-weight: 500;
    color: #2e2e2e;
}
.input-field input, select{
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
.input-field input :focus,
.input-field select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.input-field select,
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}
.container form button, .backBtn{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    /* max-width: 200px; */
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin: 25px 0;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
}
.container form .btnText{
    font-size: 20px;
    font-weight: 400;
}
form button:hover{
    background-color: #265df2;
}
form button i,
form .backBtn i{
    margin: 0 6px;
}
form .backBtn i{
    transform: rotate(180deg);
}
form .buttons{
    display: flex;
    align-items: center;
}
form .buttons button , .backBtn{
    margin-right: 14px;
}
form .register-link {
    /* background-color: #4070f4; */
    margin: 0 auto;
    font-size: 20px;
    font-weight: 400;
    transition: all 0.3s linear;
}
form .register-link a {
    text-decoration: none;
    color: blue;
    font-size: 20px;
    font-weight: 400;
    transition: all 0.3s linear;
}
form .register-link a:hover{
    text-decoration: underline;
    font-weight: 500;
    font-size: 22px;
    transition: all 0.3s ;
}

@media (max-width: 750px) {
    .container form{
        overflow-y: scroll;
    }
    .container form::-webkit-scrollbar{
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
</style>    
    
</body>
</html>
<!-- INSERT INTO `register` (`Sno`, `name`, `id`, `dob`, `email`, `mobile`, `gender`, `password`, `conpass`) VALUES ('1', 'test', 'test123', '2014-04-09', 'test@gmail.com', '9858495894', 'male', 'pass123', 'pass123'); -->