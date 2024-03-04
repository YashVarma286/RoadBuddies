<?php 
if(isset($_POST['submit'])){
  echo "<script> alert('Action Restricted! You Need To Login First');
            document.location.href = 'login.php';     
            </script>";
}
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
    <form action="findride.php" method="post">
      <div class="from">
        <!-- <input type="text" id="from" required> -->
        <select name="from" required>
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
        <label>From</label>
      </div>

      <div class="from">
        <!-- <input type="text" id="to" required> -->
        <select name="to" required>
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
        <input type="text" id="date" onfocus="(this.type='date')"  required>
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
    .from input[type="Date"] {
    color: #000;
    
} 
.from select:focus~label,
.from select:valid~label {
    top: -5px;
    color: #2691d9;
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
.from select:focus~span::before,
.from select:valid~span::before{
  width: 100%;
}
  </style>
</body>

</html>