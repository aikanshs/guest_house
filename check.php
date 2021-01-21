
<!DOCTYPE HTML>  
<html>
<head>
<style >
    p{
        text-align: center;
        font-size: 15px;
        color: black;
    }
    .new_form{
        margin: auto;
        width: 50%;
        border: 3px solid green;
        padding: 10px;
    }
</style>
</head>
<body>
<?php
session_start();
include 'base.html';
include ('img_anim.html');
?>
<div class="new_form">
      <form action="book.php" method="POST">
         <div>
         <label for='start_date'>START DATE<br>


 <?php


$db_name="guest_house";
$db_user="root";
$db_pwd="@Qwerty1234";
$db_host="localhost";
$table_name="bookings";

$con = mysqli_connect($db_host, $db_user,$db_pwd ,$db_name);

$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$room=$_POST["rooms"];

$datetime1 = strtotime($start_date);
$datetime2 = strtotime($end_date);
if($start_date>$end_date){
  echo '<script>alert("End date should be greater than start date"); window.location.href="welcome.php";</script>'; 
  
}
$secs = $datetime2 - $datetime1;
$days = $secs / 86400;
if($days==0)
    $days=1;

$cost_with_rt=20000;
$cost_without_rt=15000;

$cost=0;
  
            echo "<input type='date' id='start_date' name='start_date' value=$start_date   >";
             echo  "</label></div>";
         
            echo"<div> <label for='end_date'>END DATE<br>";
            echo "<input type='date' id='end_date' name='end_date' value=$end_date  >
        </label>
         </div>
         <div>
            <label for='rooms'>Select Room Type
            <br>
            <select name='rooms' id='rooms' value=$room>";
            if(strcmp($room, "gs")==0)
              echo "<option selected='' value='gs'>Guest House without rooftop</option>";
          else
              echo "<option value='gs1'> Guest House with rooftop</option>";
?>
        </select>
        </label>
         </div>
         <div>
            <label for='Phone_num'>Phone Number<br>
             <input type='number' name='phone' required>
         </div>
         <div>
            <label for='Phone_num'>Full Name<br>
             <input type='name' name='name' required>
         </div>
      <div>
            <input type="submit" name="replan" value="Replan your Stay"> </input>
            <button name="submit" value="submit">Book your Stay </button>
         </div>
          </form>
            
<?php

  function room_booked($str1) {
      
      if(strcmp($str1, "gs")==0)
        return 1;
      else if(strcmp($str1, "gs")==0)
        return 3;
  }

	if(!$con){

		echo "Error while making connection";
	}
	else{
        $query = "SELECT * FROM bookings";
        
        if( !empty($_POST["start_date"]) && !empty($_POST["end_date"]) && $_POST["rooms"]){
            $query= $query." WHERE start_date>= '$start_date' or end_date <= '$end_date'";
       }
        // echo "<p> $end_date </p>";

        $query= $query." order by start_date;";
    
		//echo "<p> $query </p>";
        $room_count=room_booked($room);
		    $result = mysqli_query($con, $query);
        $flag=false;
        
        while ($row = mysqli_fetch_array($result)){
            if($row["start_date"]<$end_date &&$row["end_date"]>$end_date)
                $flag=true;
            else if($row["start_date"]==$start_date &&$row["end_date"]==$end_date)
                $flag=true;
    
        }
        
        if($flag){
            echo '<script>alert("Sorry, there is already a booking at this time"); window.location.href="welcome.php";</script>'; 
  
            
        }
        else{
            echo "<div>";
                echo "<p> Guest house is available, please go ahead and book your room</p>";
                if(strcmp($room, "gs")==0){
                    $cost=$days*$cost_without_rt;
                    echo "<p> Daily cost is Rs. $cost_without_rt </p>";
                    echo "<p> Total cost is Rs. ".$cost."</p>";
                       
                }
                else {
                    $cost=$days*$cost_with_rt;
                    echo "<p> Daily cost is Rs. $cost_with_rt </p>";
                    echo "<p> Total cost is Rs. ".$cost."</p>";
                       
                }
            echo "</div>";
            
         }
     }
     session_destroy();
?>
    

</div>
</body>   
</html>
