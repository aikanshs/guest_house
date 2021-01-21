<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<style type="text/css">
		table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}

	td, th {
	  border: 1px solid #dddddd;
	  text-align: left;
	  padding: 8px;
	}

	tr:nth-child(even) {
	  background-color: #dddddd;
	}
	</style>
</head>
<body>
	<?php
		include 'base.html';
    	include ('img_anim.html');

	?>
	<h2> Below are the bookings</h2>
	<table style="width:auto; background-color:#FFFDFD;">
	<?php
		session_start();


		$db_name="guest_house";
		$db_user="root";
		$db_pwd="@Qwerty1234";
		$db_host="localhost";
		$table_name="bookings";

		$con = mysqli_connect($db_host, $db_user,$db_pwd ,$db_name);

		if(!$con){

			echo "Error while making connection";
		}
		else{

			$email=$_POST["email"];
			$pwd=$_POST["password"];
			$query="select * from guest_house.admin_login where email='$email' and password='$pwd' ;";
			$result = mysqli_query($con, $query);
			$num_rows=mysqli_num_rows($result);
			if($num_rows>0){
				$query = "SELECT * FROM guest_house.bookings;";
	      	
				$result = mysqli_query($con, $query);

		            echo "<tr>
		              <th>Phone</th>
		              <th>Start Date</th>
		              <th>End Date</th>
		              <th>Cost</th>
		              <th>Room Type</th>
		              <th>Full Name</th>
		            </tr>";
		            while ($row = mysqli_fetch_array($result)){
		                echo "<tr><td> " . $row["phone"] . " </td><td> " . $row["start_date"]. " </td><td> " . $row["end_date"]. " </td><td> " . $row["cost"]. " </td><td> " . $row["room_type"]. " </td><td> " . $row["fname"]." </td></tr>";
		            }
					
			    }
			}
	        
    ?>
	</table>
</body>
</html>
