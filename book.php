<head>
    <style type="text/css">
        p{
            margin-left: 15px;
            margin-right: 15px;
            text-align: center;
            font-size: 20px;
            color: black;
        }
    </style>
</head>
<?php
session_start();
include 'base.html';
include ('img_anim.html');
//echo "<p>hey</p>";
$db_name="guest_house";
$db_user="root";
$db_pwd="root";
$db_host="localhost";
$table_name="bookings";

$con = mysqli_connect($db_host, $db_user,$db_pwd ,$db_name);

$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$room=$_POST["rooms"];

$phone=$_POST["phone"];
$fname=$_POST["name"];
$datetime1 = strtotime($start_date);
$datetime2 = strtotime($end_date);
$click=$_POST["replan"];
$count=strcmp($click, 'Replan your Stay');
//echo "<p>$count</p>";
if($count==0)
{
    header("Location: welcome.php");
}

$secs = $datetime2 - $datetime1;
$days = $secs / 86400;
if($days==0)
    $days=1;
$cost=0;

//echo "$room";

//echo (start_date,end_date,room);
	if(!$con){

		echo "Error while making connection";
	}
	else{
        
        $query = "insert into $db_name.$table_name values($phone,'$start_date','$end_date',0,'$room','$fname');";
        //echo "<p>hi $start_date $query</p>";
        $result = mysqli_query($con, $query);
        
        if($result){
            echo "<p>Your guest house has been booked. Someone from our team will contact you for payment and confirmation of your booking. Your booking details are provided below.</p>";
            echo "<p> You can also contact Mr Sujit Kumar. Contact Number: 9199523138</p>";
            echo "<p> Start Date of your booking".$start_date."</p><p> End Date of your booking".$end_date;
            if(strcmp($room, "1room")==0)
                    $cost=$days*1000;        
            else if(strcmp($room, "2room")==0)
                $cost=$days*2000;
            else if(strcmp($room, "3room")==0)
                $cost=$days*3000;
            else 
                $cost=$days*15000;
            echo "<p> Your total cost of stay is Rs.".$cost." </p";
            $query ="update $db_name.$table_name set cost=$cost where phone=$phone ;";
            //echo "<p>$query</p>";
            $result = mysqli_query($con, $query);
        
         }   
         $msg="Name: ".$fname." \n Phone: ".$phone." \n Start Date".$start_date."\n End Date: ".$end_date." \n Room".$room;
         $msg = wordwrap($msg,70);
         //echo "<p>$msg</p>";
        
         mail("aikanshs@gmail.com","New booking",$msg);


        
        

		
    }
?>        

