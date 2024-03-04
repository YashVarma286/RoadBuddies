<?php 
 require_once('header.php');
// require "session1.php";
$conn = connect();
?>

<section class="content-header">
	<h1>Dashboard</h1>
</section>

<?php
$result = "SELECT count(1) FROM register";
$query = mysqli_query($conn, $result);
  $row = mysqli_fetch_array($query);
    $total_users = $row[0];

$result = "SELECT count(1) FROM offer_temp";
      $query = mysqli_query($conn, $result);
        $row = mysqli_fetch_array($query);
          $active_rides = $row[0];

      $result = "SELECT count(1) FROM booking";
      $query = mysqli_query($conn, $result);
        $row = mysqli_fetch_array($query);
          $completed_rides = $row[0];

      $result = "SELECT count(1) FROM addcar";
      $query = mysqli_query($conn, $result);  
        $row = mysqli_fetch_array($query);
          $total_vehicles = $row[0];

?>

<section class="content">
<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $total_users; ?></h3>

                  <p>Registrations</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-cart"></i>
                </div>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3><?php echo $active_rides; ?></h3>

                  <p>Active Rides</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-clipboard"></i>
                </div>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $completed_rides; ?></h3>

                  <p>Completed Orders</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-checkbox-outline"></i>
                </div>
               
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $total_vehicles; ?></h3>
                  <p>Total Vehicles</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-checkmark-circled"></i>
                </div>
              </div>
            </div>
			<!-- ./col -->	
		  </div>
</section>