<?php
require "session1.php";
$conn = connect();

if(isset($_POST["submit"])){
$q1 = "SELECT * FROM offer_temp";
$query = mysqli_query($conn, $q1); 
if(mysqli_num_rows($query))  
      {  
        while($row = mysqli_fetch_assoc($query)){
          $date = $row['date'];
          $seat = $row['seat'];}}
        $curr_date = date('Y-m-d');

            $q2 = "DELETE FROM offer_temp WHERE date < '$curr_date'";  
            $query1 = mysqli_query($conn, $q2); 
            if($query1){
                echo "<script> alert('Rides Updated Successfully');
                    document.location.href = 'manageride.php';     
                    </script>";
              }
              else{
                  echo "<script> alert('Error');
                  document.location.href = 'manageride.php';     
                  </script>";
              }
        
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Rides</title>
</head>
<body>
    <form action="manageride.php" method="post">
        <div class="box"><h2>Updates Rides</h2></div>
    <button type="submit" class="sumbit" name="submit"> 
        <span class="btnText">Update Rides</span>
    </button>

    </form>
</body>
</html>
<style>
form {height: 200px;
width: 300px;border: 2px solid black;border-radius: 5px;margin: auto;margin-top: 300px;text-align: center;}
</style>