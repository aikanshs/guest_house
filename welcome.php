<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="welcome.css">
    <script src="welcome.js"></script>
</head>

<?php
    include 'base.html';
    include ('img_anim.html');

?>
    <body>
    <div class="search">
        <!-- <p style="font-size: 20px;text-decoration-color: black;margin-left: 150px;"><a href="facilities.php">Click here to look out for facilities</a></p> -->
         <h2 style="text-align: center;color: black;"> Find Vacancy at the best price</h2>
         <form action="check.php" method="POST">
         <div class="1">
            <label for="start_date">START DATE<br>
            <input type="date" id="start_date" name="start_date" min=<?php echo date('Y-m-d');?> >
            <!-- <input type="date" id="start_date" name="start_date" > -->
        </label>
         </div>
         <div>
            <label for="end_date">END DATE<br>
            <input type="date" id="end_date" name="end_date" >
        </label>
         </div>
         <div>
            <label for="rooms">Select Room Type
            <br>
            <select name="rooms" id="rooms" >
            <!-- <option value="1room">1 Room </option>
            <option value="2room">2 Rooms </option> -->
             <!-- <option value="3room">3 Rooms </option> -->
            <option value="gs">Guest House without rooftop</option>
            <option value="gs1">Guest House with rooftop</option>
            
            </select>
        </label>
         </div>
         <div>
            <button >Search </button>
         </div>
         </form>
         <br>
         <br>
         <p style="font-size: 15px;color: black;">Ridhi Sidhi Family Function is one of the most spacious and luxurious guest house in Patna. The guest house is available for family functions like Marriage, birthday parties, engagement, Reception, and even for corporate events.</p>
         <h3>Special Features provided for family function</h3>

         <ul style="font-size:15px;color: black;">
         	<li>Location inside the city</li>
			<li>3 Rooms with double beds</li>
			<li>Spacious Kitchen</li>
			<li>Large Hall for family function with more than 50 people</li>
			<li>2 Well-maintained washrooms</li>
			<li>Rooftop for open air party</li>
			<li>Emergency power supply</li>
			<li>24hrs Water Supply/Hot water</li>
			<li>ATM facility inside Guest House</li>
			<li>No Hidden Charges!!</li>

		</ul>
		<p style="font-size: 25px;">New facility!! Catering on Demand!!!</p>

		<p>Note: Refund on cancellation will be given if cancelled 1 day before the date of booking</p>
    </div>
    <script type="text/javascript">
        function checkDate(){
        var startDate = new Date($('start_date').val());
        var endDate = new Date($('end_date').val());

        if (startDate > endDate){
            alert("End date should be greater than Start date");
            document.getElementById("end_date").value = "";
        }
    }
    </script>
  </body>
</html>

<!-- root1234 -->