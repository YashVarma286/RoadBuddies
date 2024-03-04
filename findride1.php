<?php
require "session.php";
if($_SESSION['login']){
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="CSS/find.css">

<head>
  <title>Find a Ride</title>
</head>

<body>
<div class="progress">
  </div>
  <img class="bg" style="height: 100vh; width: 100vw;" src="Img/renbg.jpg" alt="Image">
  <div class="container">
    <h1>Find a Ride</h1>
    <form action="results.php" method="post">
      <div class="from">
        <!-- <input type="text" name="from1" id="from" required> -->
        <select name="from1" required>
              <option></option>
              <option value="AmruthDham">AmruthDham</option>
              <option>Aurangabad Naka</option>
              <option>Bombay Naka</option>
              <option>Canada Corner</option>
              <option>City Central Mall</option>
              <option>College Road</option>
              <option value="Dwarka Circle">Dwarka Circle</option>
              <option>Gangapur Road</option>
              <option>Indira Nagar</option>
              <option>Jatra Hotel</option>
              <option value="KK Wagh College">KK Wagh College</option>
              <option>MET Bhujbal Knowledge City College</option>
              <option>Nashik Road</option>
              <option>Nashik Road Railway Station</option>
              <option>Nimani Bustand</option>
              <option>Ozar</option>
              <option>Panchavati Karanja</option>
              <option>Raivar Karanja</option>
              <option>RTO Corner</option>
              <option>Sandip College</option>
              <option>Shalimar</option>
              <option>Thakkar Bazzar</option>
              <option>Trimbak Road</option>
              <option>Upnagar</option>
          </select>
        <span></span>
        <label>From</label>
      </div>
      <div class="from">
        <!-- <input type="text" name="to1" id="to" required> -->
        <select name="to1" required>
        <option></option>
              <option>AmruthDham</option>
              <option>Aurangabad Naka</option>
              <option>Bombay Naka</option>
              <option>Canada Corner</option>
              <option>City Central Mall</option>
              <option>College Road</option>
              <option>Dwarka Circle</option>
              <option>Gangapur Road</option>
              <option>Indira Nagar</option>
              <option>Jatra Hotel</option>
              <option>KK Wagh College</option>
              <option>MET Bhujbal Knowledge City College</option>
              <option>Nashik Road</option>
              <option>Nashik Road Railway Station</option>
              <option>Nimani Bustand</option>
              <option>Ozar</option>
              <option>Panchavati Karanja</option>
              <option>Raivar Karanja</option>
              <option>RTO Corner</option>
              <option>Sandip College</option>
              <option>Shalimar</option>
              <option>Thakkar Bazzar</option>
              <option>Trimbak Road</option>
              <option>Upnagar</option>
          </select>
        <span></span>
        <label>To</label>
      </div>
      <div class="from">
        <input type="text" name="date1" id="date" onfocus="(this.type='date')" required>
        <span></span>
        <label>Date</label>
      </div>
      <div class="from">
        <input type="text" id="time" onfocus="(this.type='time')" required>
        <span></span>
        <label>Time</label>
      </div>
      <div class="from">
        <input type="number" id="seats" min="1" max="10" required>
        <span></span>
        <label>Seats</label>
      </div>
      <input type="submit" name="submit" value="Search">
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
      var dtToday = new Date();
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
        month = '0' + month.toString();
      if(day < 10)
        day = '0' + day.toString();
      var maxDate = year + '-' + month + '-' + day;
      document.getElementById("date").setAttribute('min', maxDate)
  </script>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    margin: 0;
    padding: 0;
    /* background: linear-gradient(120deg, #29fd53, #90f8a4); */
    height: 100vh;
    overflow: hidden;
}
.bg {
    position: absolute;
    z-index: -1;
    opacity: 1;
  }

.container {
    /* margin-left: 500px;
    margin-top: 100px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 500px;
    width: 500px;
    border: 1px solid black;
    background-color: rgb(255, 255, 255);
    border-radius: 10px;
    box-shadow: 10px 10px 15px rgb(90, 208, 208); */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    background: white;
    border-radius: 10px;
    box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
}

h1 {
    text-align: center;
    padding: 20px 0;
    border-bottom: 1px solid silver;
}
.container form{
    padding: 0 40px;
    box-sizing: border-box;
}
form .from{
    position: relative;
    border-bottom: 2px solid #adadad;
    margin: 30px 0;
}
.from input, select {
    width: 100%;
    padding: 10px;
    height: 40px;
    font-size: 16px;
    border: none;
    background: white;
    outline: none;
}

.from label {
    color: #adadad;
    transform: translateY(-50%);
    font-size: 16px;
    pointer-events: none;
    position: absolute;
    top: 50%;
    left: 5px;
    transition: .5s;
}

.from span::before {
    content: '';
    position: absolute;
    top: 40px;
    left: 0;
    width: 0%;
    height: 2px;
    background: #2691d9;
    transition: .5s;
}
.from input:focus~label,
.from input:valid~label {
    top: -5px;
    color: #2691d9;
}

.from input:focus~span::before,
.from input:valid~span::before{
  width: 100%;
}
.from select:focus~label,
.from select:valid~label {
    top: -5px;
    color: #2691d9;
}

.from select:focus~span::before,
.from select:valid~span::before{
  width: 100%;
}
input[type="submit"] {
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
}
input[type="submit"]:hover {
    border-color: #29fd53;
    transition: .5s;
  }
.from input[type="Date"] {
    color: #000;
    
} 
 .search {
    padding: 10px;
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
</body>

</html>
<?php
}
else{
  header("location:login.php");
}
?>