<?php 

require 'session1.php';
$conn = connect();
if($_SESSION['login1']){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
<header>
    <nav>
      <div class="name">
      <li><a href="#">Road Buddies</a></li>
      </div>
      <div class="admin">
      <li><img src="Img/list.svg" style="background-color: #fff; margin-right: 20px;"></img> <a href="#">Admin Panel</a></li>
      </div>
        <!-- <ul class="ul">
            <li><a href="#"><img src="Img/menu-fill.png"></img>Admin Panel</a></li>
            <li><a href="#">Manage User</a></li>
            <li><a href="manageride.php">Manage Rides</a></li>
        </ul> -->
        <div class="login">    
                <a href="#">Administrator</a>
                <!-- <a href="#"> <?= $_SESSION['login1'] ?> </a> -->
            <!-- <a href="logout1.php"> <img src="Img/user-fill.png" class="menu"></img>LogOut</a> -->
        </div>
    </nav>
</header>
<section class="sidebar">
<ul class="sidebar-menu">

			        <li class="treeview <?php if($cur_page == 'index.php') {echo 'active';} ?>">
			          <a href="admin.php">
			            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
			          </a>
			        </li>
                 
                    <li class="treeview <?php if( ($cur_page == 'product.php') || ($cur_page == 'product-add.php') || ($cur_page == 'product-edit.php') ) {echo 'active';} ?>">
                        <a href="manageride.php">
                            <i class="fa fa-shopping-bag"></i> <span>Ride Management</span>
                        </a>
                    </li>
                     <!-- <li class="treeview <?php if( ($cur_page == 'slider.php') ) {echo 'active';} ?>">
			          <a href="manageride.php">
			            <i class="fa fa-picture-o"></i> <span>Manage Rides</span>
			          </a>
			        </li> -->
              <li class="treeview <?php if( ($cur_page == 'customer.php') || ($cur_page == 'customer-add.php') || ($cur_page == 'customer-edit.php') ) {echo 'active';} ?>">
			          <a href="manageusers.php">
			            <i class="fa fa-user-plus"></i> <span>Registered Customer</span>
			          </a>
			        </li>
                    <!-- Icons to be displayed on Shop -->
			        <li class="treeview <?php if( ($cur_page == 'service.php') ) {echo 'active';} ?>">
			          <a href="service.php">
			            <i class="fa fa-list-ol"></i> <span>Services</span>
			          </a>
			        </li>
			      	<li class="treeview <?php if( ($cur_page == 'faq.php') ) {echo 'active';} ?>">
			          <a href="faq.php">
			            <i class="fa fa-question-circle"></i> <span>FAQ</span>
			          </a>
			        </li>
      			</ul>
</section>
  <!-- <span class="dash">
    <h3>DASHBOARD</h3>
  </span> -->
</section>
<div class="box">
<section>
    <h2>Total Users Registered</h2>
    <?php
      $result = "SELECT count(1) FROM register";
      $query = mysqli_query($conn, $result);
      
        $row = mysqli_fetch_array($query);
          $total = $row[0];
      echo "$total";

    ?>
</section>
<section>
    <h2>Active Rides</h2>
    <?php
      $result = "SELECT count(1) FROM offer_temp";
      $query = mysqli_query($conn, $result);
      
        $row = mysqli_fetch_array($query);
          $total = $row[0];
      echo "$total";

    ?>
</section>
<section>
    <h2>Completed Rides  </h2>
    <?php
      $result = "SELECT count(1) FROM booking";
      $query = mysqli_query($conn, $result);
      
        $row = mysqli_fetch_array($query);
          $total = $row[0];
      echo "$total";

    ?>
  
</section></div>
</body>
</html>
<?php
}
else{
  header("location:adminlogin.php");
}
?>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.box {height: 100vh;width: 100vw-230px;margin-left: 230px;margin-top: 50px;}
.admin{margin-left: 60px;}
.name li a, .admin li a{list-style: none; color: #fff;text-decoration: none; font-size: 20px; font-family:  "Roboto", sans-serif;}
.admin li a{font-size: 18px;}
.sidebar{
  height: 100vh;
  width: 230px;
  overflow: hidden;
  position: absolute;
  background-color: #333333;
}

.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;}
    .sidebar a{color: #b8c7ce;text-decoration: none;}
    .sidebar ul li{height: 50px;}
    .sidebar-menu>li>a {padding: 12px 5px 12px 15px;display: block;}
.sidebar ul{margin-top: 50px;}
  .menu {
    background-color: #fff;color: #fff;
  }
  header {
    background-color: #131921;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    /* position: fixed; */
    top: 0;
    left: 0;
    width: 100%;
    z-index: 998;
    height: 50px;
    position: fixed;

  }
  nav {
    display: flex;
    align-items: center;
    margin-top: 0;
    padding: 1rem;
    height: 50px;
  }
  
  .ul {
    margin-left: 200px;
    display: flex;
    list-style: none;
    padding: 0px;
  }
  
  nav ul li {
    display: block;
    font-size: 18px;
    width: 140px;
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
  .login a{list-style: none;
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
  /* .login a:hover{
    font-size: 17.5px;
    text-decoration: underline;
    color: skyblue;
    font-weight: 500;
    transition: all ease-in .1s;
  } */
  .login{
    display: flex;
    flex-direction: row;
    margin-left: 1000px;
    padding: 30px;
  }

  .user{
    background-color: #29fd53;
    border-radius: 5px;
    height: 24px;
    width: 19px;
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
    padding-left: 300px;
    font-family: 'Ubuntu', sans-serif;
  }
</style>