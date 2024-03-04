<?php
require "session.php";
if($_SESSION['login']){
  $user = $userid;
$conn = connect();

if(isset($_POST['submit'])){
  if(isset($_POST['cfrom'])===isset($_POST['cto'])){
    
    $cno = $_POST['cno'];
    $_cfrom = $_POST['cfrom'];
    $cto = $_POST['cto'];
    $date =  date('Y-m-d', strtotime($_POST['date']));
    $date1 =  date('Y-m-d', strtotime($_POST['date1']));
    $time = $_POST['time'];
    $seats = $_POST['seats'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `offeraride` (`cno`, `cfrom`, `cto`, `date`, `date1`, `time`, `seats`, `price`, `description`) VALUES ('$cno', '$_cfrom', '$cto', '$date', '$date1', '$time', '$seats', '$price', '$description')";

    $query = mysqli_query($conn,$sql);
    if($query){
      echo "<script> alert('Entry Successful');
          document.location.href = 'index1.php';     
          </script>";
    }
    else{
        echo 'Something went wrong !!';
    }
  
}else{
  echo "<script> alert('From and To locations are not supposed to be same!!!');     
          </script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
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
      <form action="temp.php" method="POST">
        <div class="fields">
      
      <div class="input-field">
        <input type="text" id="cno" name="cno" required>
        <span></span>
        <label for="from">Car Number</label>
       </div>
       <br>
        <div class="input-field">
        <input type="text" id="time" name="time"  onfocus="(this.type='time')" required>
        <span></span>
        <label for="time">Time</label>
        </div>
        <br>
       <div class="input-field">
        <!-- <input type="text" id="from" name="cfrom" required> -->
          <select name="cfrom" required>
          <option></option>
              <option id="0">AmruthDham</option>
              <option id="1">Aurangabad Naka</option>
              <option id="2">Bombay Naka</option>
              <option id="3">Canada Corner</option>
              <option id="4">City Central Mall</option>
              <option id="5">College Road</option>
              <option id="6">Dwarka Circle</option>
              <option id="7">Gangapur Road</option>
              <option id="8">Indira Nagar</option>
              <option id="9">Jatra Hotel</option>
              <option id="10">KK Wagh College</option>
              <option id="11">MET Bhujbal Knowledge City College</option>
              <option id="12">Nashik Road</option>
              <option id="13">Nashik Road Railway Station</option>
              <option id="14">Nimani Bustand</option>
              <option id="15">Ozar</option>
              <option id="16">Panchavati Karanja</option>
              <option id="17">Raivar Karanja</option>
              <option id="18">RTO Corner</option>
              <option id="19">Sandip College</option>
              <option id="20">Shalimar</option>
              <option id="21">Thakkar Bazzar</option>
              <option id="22">Trimbak Road</option>
              <option id="23">Upnagar</option>
          </select>
        <span></span>
        <label for="from">From</label>
          
       </div>
       <br>
        <!-- <div class="input-field">
        <input type="text" id="date" name="date" onfocus="(this.type='date')" required>
        <span></span>
        <label for="date">Date</label>
        </div>
        <br> -->
       <div class="input-field">
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
        <input type="number" id="seats" name="seats" min="1" max="10" required>
        <span></span>
        <label for="seats">Available seats</label>
        </div>
        <br>
        <div class="input-field">
        <input type="number" id="price" name="price" min="0" max="999999" required>
        <span></span>
        <label for="price">Price per seat</label>
        </div>
        <br>
        <div class="input-field">
        <input type="text" id="date" name="date" onfocus="(this.type='date')" required>
        <span></span>
        <label for="date">Offer From</label>
        </div>
        <br> 
        <div class="input-field">
        <input type="text" id="date1" name="date1" onfocus="(this.type='date')" required>
        <span></span>
        <label for="date">Offer To</label>
        </div>
       <!-- <div class="input-field">
        <textarea id="description" name="description" required></textarea>
        <span></span>
        <label for="description">Description</label>
       </div> -->
        <br>
        <!-- <div class="submit"> -->
          <input type="submit" name="submit" value="Offer Ride">
        <!-- </div> -->
        </div>
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
      document.getElementById("date1").setAttribute('min', maxDate)
  </script>
<style>
element.style {
    width: 345px;
}
.select2-container--open .select2-dropdown--below {
    border-top: none;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.select2-container--open .select2-dropdown {
    left: 0;
}
.select2-dropdown {
    background-color: white;
    border: 1px solid #aaa;
    border-radius: 4px;
    box-sizing: border-box;
    display: block;
    position: absolute;
    left: -100000px;
    width: 100%;
    z-index: 1051;
}
.select2-container {
    box-sizing: border-box;
    display: inline-block;
    margin: 0;
    position: relative;
    vertical-align: middle;
}
.select2-container--default.select2-container--open.select2-container--below .select2-selection--single, .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
}
.select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 28px;
    user-select: none;
    -webkit-user-select: none;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #5897fb;
    color: white;
}
.select2-container--default .select2-results__option[aria-selected=true] {
    background-color: #ddd;
}
.select2-results__option[aria-selected] {
    cursor: pointer;
}
.select2-results__option {
    padding: 6px;
    user-select: none;
    -webkit-user-select: none;
}
.select2-container--default .select2-results>.select2-results__options {
    max-height: 200px;
    overflow-y: auto;
}
.select2-results__options {
    list-style: none;
    margin: 0;
    padding: 0;
}
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

  .container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 600px;
    background: white;
    border-radius: 10px;
    box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
   
}
.fields {
  display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

form .fields .input-field {
    display: flex;
    width: calc(100% / 2 - 15px);
    flex-direction: column;
    margin: 10px 0;
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
  margin: 10px;
    position: relative;
    border-bottom: 2px solid #adadad;
    margin: 5px 0;
    width: calc(100% / 2 - 15px);
}
.input-field input, textarea, select {
    width: 100%;
    padding: 10px;
    height: 40px;
    font-size: 16px;
    /* margin: 10px; */
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
    margin-top: 20px;
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
<?php
}
else{
  header("location:login.php");
}
?>


