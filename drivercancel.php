<?php
require 'session.php';
$conn = connect();
$loginname = $login_session;
if ($_SESSION['login']) {
  $login = $_SESSION['login'];
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Ride</title>
  </head>

  <body>
    <img class="bg" style="height: 100vh; width: 100vw;" src="Img/renbg.jpg" alt="Image">
    <header>
      <nav>
        <ul class="ul">
          <li><a href="index1.php">Home</a></li>
          <li><a href="findride1.php">Find a Ride</a></li>
          <li><a href="offerride1.php">Offer a Ride</a></li>
          <li><a href="index1.php">Dashboard</a></li>
          <li><a href="mycars.php">MyVehicles</a>
          </li>
          <!-- <li><a href="#">My Administration</a></li> -->
        </ul>
        <div class="login">
          <div class="welcome">
            <a href="#" onmouseenter="side()" onmouseup="side1()">Welcome <?= $loginname ?> </a>
          </div>
          <a href="logout.php">LogOut <img src="Img/user-fill.png" class="user"></img></a>
        </div>
      </nav>
    </header>

    <?php

    $curr_date = date('Y-m-d');
    $sql1 = "SELECT * FROM offer_temp WHERE login='$login' AND date>='$curr_date'";

    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
      if (mysqli_num_rows($result1)) {
    ?>
        <div class="container">
          <div class="jumbotron">
            <h1 class="text-center">Your Active Rides</h1>
            <p class="text-center"> Hope you enjoyed our service </p>
          </div>
        </div>

        <div class="table-responsive" style="padding-left: 200px; padding-right: 100px;">
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th width="5%">Car No</th>
                <th width="5%">From</th>
                <th width="6%">To</th>
                <th width="6%">Date</th>
                <th width="6%">Seats Available</th>
                <th width="5%">Price Per Seat</th>
                <th width="4%">Action</th>
              </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result1)) {
            ?>
              <tr>
                <td><?php echo $row["cno"]; ?></td>
                <td><?php echo $row["cfrom"]; ?> </td>
                <td><?php echo $row["cto"] ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["seat"]; ?></td>
                <td><?php echo $row["price"]; ?></td>
                <td>
                  <form action="" method="post" class="form1">
                    <button type="submit" name="edit" class="btn">
                      <span class="btnText">Edit</span>
                    </button>
                    <button type="submit" name="cancel" class="button">
                      <span class="btnText">Cancel</span>
                    </button>
                    <!-- <div class="button" onclick="cancel()">Cancel</div> -->
                    <input type="hidden" name="car_id1" value="<?php echo $row["cno"]; ?>">
                    <input type="hidden" name="o_date1" value="<?php echo $row["date"]; ?>">
                    <input type="hidden" name="o_from" value="<?php echo $row["cfrom"]; ?>">
                    <input type="hidden" name="o_to" value="<?php echo $row["cto"]; ?>">
                  </form>
                </td>
              </tr>
            <?php        } ?>
          </table>
        </div>
      <?php } else {
      ?>
        <div class="container">
          <div class="jumbotron">
            <h1 class="text-center">You have no active cars!</h1>

          </div>
        </div>

    <?php
      }
    } else {
      echo "Query Not Runned";
    }
    ?>
    <!-- <div class="can" id="cancel">
      <form action="" method="post"><div class="p1" >
          <p>Are You Sure To Cancel Your Ride ?</p>
      </div>
      <button type="submit" name="yes" class="button1"> 
          <span class="btnText">Yes</span>             
      </button>
      <button type="submit" name="no" onclick="cancel3()" class="btn1"> 
          <span class="btnText">No</span>
      </button>
        <input type="hidden" name="car_id" value="<?php echo $row["cno"]; ?>">
        <input type="hidden" name="o_date" value="<?php echo $row["date"]; ?>">
    </form>
  </div>  -->

    <?php
    if (isset($_POST['edit'])) {
      $car_id1 = $_POST['car_id1'];
      $o_date1 =  date('Y-m-d', strtotime($_POST['o_date1']));
      $o_from = $_POST['o_from'];
      $o_to = $_POST['o_to'];
    ?>
      <div class="container1" id="container1">
        <div class="h1">
          <h1>Update Your Ride</h1>
        </div>
        <div class="form">
          <form action="update.php" method="POST">
            <div class="fields">
              <div class="input-field">
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
                <input type="text" id="date" name="date" onfocus="(this.type='date')" required>
                <span></span>
                <label for="date">Date</label>
              </div>
              <br>
              <div class="input-field">
                <input type="text" id="time" name="time" onfocus="(this.type='time')" required>
                <span></span>
                <label for="time">Time</label>
              </div>
              <br>
              <div class="input-field">
                <input type="number" id="seats" name="seat" min="1" max="10" required>
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
              <input type="submit" name="submit" value="Update Ride">
              <div class="no" onclick="cont()">
                <p>
                <h3>Cancel</h3>
                </p>
              </div>
            </div>
            <input type="hidden" name="car_id" value="<?php echo $car_id1 ?>">
            <input type="hidden" name="o_date" value="<?php echo $o_date1 ?>">
            <input type="hidden" name="o_from" value="<?php echo $o_from ?>">
            <input type="hidden" name="o_to" value="<?php echo $o_to ?>">
          </form>
        </div>

      </div>
    <?php

    }

    if (isset($_POST['cancel'])) {
      $car_id1 = $_POST['car_id1'];
      $o_date1 =  date('Y-m-d', strtotime($_POST['o_date1']));
      $o_from = $_POST['o_from'];
      $o_to = $_POST['o_to'];
    ?>
      <div class="can" id="cancel">
        <form action="cancel.php" method="post">
          <div class="p1">
            <p>Are You Sure To Cancel Your Ride ?</p>
          </div>
          <button type="submit" name="yes" class="button1">
            <span class="btnText">Yes</span>
          </button>

          <input type="hidden" name="car_id" value="<?php echo $car_id1 ?>">
          <input type="hidden" name="o_date" value="<?php echo $o_date1 ?>">
          <input type="hidden" name="o_from" value="<?php echo $o_from ?>">
          <input type="hidden" name="o_to" value="<?php echo $o_to ?>">

        </form> <button type="submit" name="no" onclick="cancel3()" class="btn">
          <span class="btnText">No</span>
        </button>
      </div>
    <?php

    }
    ?>
    <script>
      var dtToday = new Date();
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if (month < 10)
        month = '0' + month.toString();
      if (day < 10)
        day = '0' + day.toString();
      var maxDate = year + '-' + month + '-' + day;
      document.getElementById("date").setAttribute('min', maxDate)
    </script>
    <script>
      var can = document.getElementById('cancel');
      var container1 = document.getElementById('container1');

      function cancel() {
        can.style.display = "block";
      }

      function cancel3() {
        can.style.display = "none";
      }

      function cont() {
        container1.style.display = "none";
      }
    </script>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      .no {
        text-align: center;
        vertical-align: center;
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
        margin-top: 10px;
      }

      .bg {
        position: absolute;
        z-index: -1;
        opacity: 1;
      }

      .container1 {
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
        width: 100%;
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

      .container1 form {
        padding: 0 40px;
        box-sizing: border-box;
      }

      .container1 form .input-field {
        margin: 10px;
        position: relative;
        border-bottom: 2px solid #adadad;
        margin: 5px 0;
        width: calc(100% / 2 - 15px);
      }

      .input-field input,
      textarea,
      select {
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
      .input-field input:valid~span::before {
        width: 100%;
      }

      .input-field textarea:focus~label,
      .input-field textarea:valid~label {
        top: -5px;
        color: #2691d9;
      }

      .input-field textarea:focus~span::before,
      .input-field textarea:valid~span::before {
        width: 100%;
      }

      .input-field select:focus~label,
      .input-field select:valid~label {
        top: -5px;
        color: #2691d9;
      }

      .input-field select:focus~span::before,
      .input-field select:valid~span::before {
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

      .search a {
        text-decoration: none;
        font-size: 25px;
        color: #e9f4fb;
        font-weight: 700;
      }

      .search:hover {
        border-color: #29fd53;
        transition: .5s;
      }
    </style>
    <style>
      .bg {
        position: fixed;
        z-index: -99;
        opacity: 1;
      }

      .can {
        display: flex;
        height: 150px;
        width: 400px;
        /* border: 2px solid ; */
        border-radius: 10px;
        margin-left: 550px;
        margin-top: 0px;
        position: absolute;
        top: 50%;
        left: 10%;
        z-index: 9999;
        font-size: 20px;
        font-family: 'Ubuntu', sans-serif;
        display: block;
        background-color: #fff;
        box-shadow: 0 5px 20px rgba(104, 104, 104, 0.8);
        transition: all 1s;
        text-align: center;
      }

      .form1 {
        display: flex;
        justify-content: center;
        flex-direction: row;
      }

      .button,
      .button1 {
        border: 0.5px solid black;
        border-radius: 2px;
        text-align: center;
      }

      .p1 {
        margin-top: 25px;
      }

      .btn,
      .button {
        margin: 5px;
      }

      button,
      .button,
      .button1 {
        height: 25px;
        width: 60px;
      }

      .button:hover,
      .button1:hover {
        background-color: red;
        color: #fff;
      }

      button:hover {
        background-color: green;
        color: #fff;
      }

      .button1 {
        margin-bottom: 0;
      }

      .container {
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
      }

      .jumbotron {
        padding-top: 30px;
        padding-bottom: 30px;
        margin-bottom: 30px;
        color: inherit;
        background-color: transparent;
        /* border: 1px solid #e7e7e7; */
        box-shadow: inset 0 2px 0 rgba(0, 0, 0, 0.05);
      }

      /* .jumbotron {

} */
      h1 {
        font-family: "Segoe UI", Arial, sans-serif;
        font-weight: 400;
        margin: 10px 0;
      }

      .jumbotron h1,
      .jumbotron .h1 {
        color: inherit;
      }

      .text-center {
        text-align: center;
      }

      .jumbotron p {
        margin-bottom: 15px;
        font-size: 25px;
        font-weight: 200;
      }

      p {
        margin: 0 0 10px;
        font-family: "Segoe UI", Arial, sans-serif;
      }

      .table-responsive {
        overflow-x: auto;
        min-height: 0.01%;
      }

      .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
      }

      table {
        background-color: transparent;
      }

      table {
        border-collapse: collapse;
        border-spacing: 0;
      }

      thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: inherit;
      }

      .table>thead>tr>th,
      .table>tbody>tr>th,
      .table>tfoot>tr>th,
      .table>thead>tr>td,
      .table>tbody>tr>td,
      .table>tfoot>tr>td {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #eeeeee;
        font-family: "Segoe UI", Arial, sans-serif;
        background-color: #fff;
      }

      th,
      td {
        text-align: center;
      }

      .table>thead>tr>th {
        vertical-align: bottom;
        border-bottom: 2px solid #eeeeee;
        font-size: 18px;
      }

      @media (min-width: 768px) {
        .container {
          width: 750px;
        }
      }

      @media screen and (min-width: 768px) {

        .container .jumbotron,
        .container-fluid .jumbotron {
          padding-left: 60px;
          padding-right: 60px;
        }
      }

      @media screen and (min-width: 768px) {
        .jumbotron {
          padding-top: 48px;
          padding-bottom: 48px;
        }
      }

      @media screen and (min-width: 768px) {

        .jumbotron h1,
        .jumbotron .h1 {
          font-size: 63px;
        }
      }

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
        width: 120px;
        font-family: 'Ubuntu', sans-serif;
      }

      nav ul li a {
        display: flex;
        text-decoration: none;
        color: #fff;
        width: 170px;
        padding: 0px;
        font-size: 18px;
        justify-content: center;
      }

      .login a {
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

      .login a:hover {
        font-size: 17.5px;
        text-decoration: underline;
        color: skyblue;
        font-weight: 500;
        transition: all ease-in .1s;
      }

      .login {
        display: flex;
        flex-direction: row;
        margin-left: 500px;
        padding: 30px;
      }

      nav ul li a:hover {
        font-size: 17.5px;
        text-decoration: underline;
        color: skyblue;
        font-weight: 500;
        transition: all ease-in .1s;
      }

      .user {
        background-color: #29fd53;
        border-radius: 5px;
        height: 24px;
        width: 19px;
      }
    </style>
  </body>

  </html>
<?php
} else {
  header("location:login.php");
}
?>