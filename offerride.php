<?php 
if(isset($_POST['submit'])){
  echo "<script> alert('Action Restricted! You Need To Login First');
            document.location.href = 'login.php';     
            </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <link rel="stylesheet" href="CSS/offer.css">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Offer a Ride</title>
</head>
<body>
  <div class="progress"> 
  </div>
  <img class="bg" style="height: 100vh; width: 100vw;" src="Img/renbg.jpg" alt="Image">
  <div class="container">
    <div class="h1">
      <h1>Offer a Ride</h1>
    </div>
    <div class="form">
      <form action="offerride.php" method="POST">
      <div class="input-field">
        <!-- <input type="text" id="from" name="cfrom" required> -->
        <select name="cfrom" required>
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
        <label for="from">From</label>
       </div>
        <br>
       <div class="input-field">
        <!-- <input type="text" id="to" name="cto" required> -->
        <select name="cto" required>
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
        <label for="to">To</label>
       </div>
        <br>
        <div class="input-field">
        <input type="text" id="date" name="date" onfocus="(this.type='date')" required>
        <span></span>
        <label for="date">Date</label>
        </div>
        <br>
        <div class="input-field">
        <input type="text" id="time" name="time"  onfocus="(this.type='time')" required>
        <span></span>
        <label for="time">Time</label>
        </div>
        <br>
        <div class="input-field">
        <input type="number" id="seats" name="seats" min="1" max="10" required>
        <span></span>
        <label for="seats">Available seats</label>
        </div>
        <br>
        <div class="input-field">
        <input type="number" id="price" name="price" min="0" max="999" required>
        <span></span>
        <label for="price">Price per seat</label>
        </div>
        <br>
       <div class="input-field">
        <textarea id="description" name="description" required></textarea>
        <span></span>
        <label for="description">Description</label>
       </div>
        <br>
        <div class="submit">
          <input type="submit" name="submit" value="Offer Ride">
        </div>
        <!-- <div class="search">
          <a href="login.php" >Offer Ride</a>
        </div> -->
      </form>
    </div>
 
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
  }
  .bg {
    position: absolute;
    z-index: -1;
    opacity: 1;
  }
  /* .container{
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
  } */
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
  
  /* .form{
    display:flex;
    flex-direction: column;
    
  } */
  h1 {
    text-align: center;
    padding: 20px 0;
    border-bottom: 1px solid silver;
    margin-bottom: 20px;
}
.container form{
    padding: 0 40px;
    box-sizing: border-box;
}
form .input-field{
    position: relative;
    border-bottom: 2px solid #adadad;
    margin: 5px 0;
}
.input-field input, textarea, select {
    width: 100%;
    padding: 10px;
    height: 40px;
    font-size: 16px;
    border: none;
    background: white;
    outline: none;
}

.input-field label {
    color: #adadad;
    transform: translateY(-50%);
    font-size: 16px;
    pointer-events: none;
    position: absolute;
    top: 50%;
    left: 5px;
    transition: .5s;
}

.input-field span::before {
    content: '';
    position: absolute;
    top: 40px;
    left: 0;
    width: 0%;
    height: 2px;
    background: #2691d9;
    transition: .5s;
}
.input-field input:focus~label,
.input-field input:valid~label {
    top: -5px;
    color: #2691d9;
}

.input-field input:focus~span::before,
.input-field input:valid~span::before{
  width: 100%;
}
.input-field textarea:focus~label,
.input-field textarea:valid~label {
    top: -5px;
    color: #2691d9;
}

.input-field textarea:focus~span::before,
.input-field textarea:valid~span::before{
  width: 100%;
}
.input-field select:focus~label,
.input-field select:valid~label {
    top: -5px;
    color: #2691d9;
}

.input-field select:focus~span::before,
.input-field select:valid~span::before{
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
/* .input-field input[type="Date"] {
    color: #adadad;
    
}  */
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
  .progress{
  
  height: 3px;
  background-color: red;
  animation: load 1s ease-in-out 1;
 
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

</style>
</body>
</html>


