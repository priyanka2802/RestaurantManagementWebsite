<link href='stylef.css' rel='stylesheet' type='text/css'>
<body class="b1">
<div class="abcd">
<?php
session_start();
$link = mysqli_connect("localhost", "root", "cherry44jerry", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$user = $_SESSION['cust_id'];
$mode = $_POST['Mode_of_order'];
$date = date('y-m-d H:i');
$date1 = "'".$date."'";
$mode1 = "'".$mode."'";
$total = 0;
$cost = 0;
if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
            $total = $total + 1;
		$sql = "insert into orders (customer_id, food_id, mode_of_order, date_and_time) values($user,$check,$mode1,$date1)";
		mysqli_query($link, $sql) or die('Error querying database1.');

		$sql1 = "select cost from food_items where Food_id ='".$check."'";
		mysqli_query($link, $sql1) or die('Error querying database.');
		$result = mysqli_query($link, $sql1);
		$row = mysqli_fetch_array($result);
		$x = $row['cost'];
		$cost = $cost + $x;
	}

	
		$query3 = "select * from orders order by serial_number desc limit 1
";
		mysqli_query($link, $query3) or die('Error querying database.4');
		$result3 = mysqli_query($link, $query3);
		$row3 = mysqli_fetch_array($result3);
		$m = $row3['mode_of_order'];
		$delC = 0;
		if($m == "Online"){
			$query4 = "select delivery_charges, emp_id, Vehicle_no from customer join area on area.Pin_code = customer.Pin_code join delivery_persons on area.Area_code = delivery_persons.Area_code 
where Customer_id ='".$user."'";
			mysqli_query($link, $query4) or die('Error querying database.5');
			$result4 = mysqli_query($link, $query4);
			$num = mysqli_num_rows($result4);
			if($num == 0){
				echo"<br>";
				$add = "location.href='UserProfile.php';";
				echo"Order cannot be delivered at your pin code.\nSorry for incovenience.\n";
				echo"<br>";
				echo"<input type='button' onclick=$add value='Go to user profile' />";

				exit(0);
			}
			$row4 = mysqli_fetch_array($result4);
			$delC = $row4['delivery_charges'];
			$emp = $row4['emp_id'];
			$_SESSION['vehicle'] = $row4['Vehicle_no'];
			$query5 = "insert into delivers values($emp, now())";
			mysqli_query($link, $query5) or die('Error querying database.6');
		}
			$_SESSION['mode'] = $mode;

			$query1 = "select Birth_date, Date_of_anniversary from customer where Customer_id = '".$user."'";
		mysqli_query($link, $query1) or die('Error querying database2.');
		$result1 = mysqli_query($link, $query1);
		$row1 = mysqli_fetch_array($result1);
		$dt = date('y-m-d');
		$discount = 0;
		if($dt == $row1['Birth_date']){
			$discount = 0.25;
			echo"Congratulations! you have got discount of 25%<br>";
			echo"Happy birthday!<br>";
		
		}
		elseif($dt == $row1['Date_of_anniversary']){
			$discount = 0.25;
			echo"Congratulations! you have got discount of 25%<br>";
			echo"Happy anniversary!<br>";
		
		}

		$query2 = "select count(*) as count from payment_and_feedback where customer_id = '".$user."' and month(date_and_time) = month(now()) and year(date_and_time) = year(now()) and date(date_and_time) != date(now())";
		mysqli_query($link, $query2) or die('Error querying database.3');
		$result2 = mysqli_query($link, $query2);
		$row2 = mysqli_fetch_array($result2);
		$val = $row2['count'];
		if($val > 5){
			$discount = $discount + 0.10;
			echo"You have placed more than five orders at our restaurant in this month.<br>";
			echo"Congratulations! you have got discount of 10%<br>";
		}
		$GST = 0.35;



			
			$Amount = $cost + ($cost*$GST) - ($cost*$discount) + $delC;
			$a = "button";
		$b = "location.href='https://paytm.com/';";
		$c = "Paytm link";
		$d = "Text";
		$e = "Feedback";
		$f = "submit";
			$_SESSION['GST1'] = $GST;
		$_SESSION['discount1'] = $discount;
		$_SESSION['Amount1'] = $Amount;
		$_SESSION['delC'] = $delC;
		echo"<br>";
		echo"Your total Bill is Rs. ".$Amount." with 35% GST and Rs. ".$delC." delivery charges.<br>";
		echo"Pay through Paytm:<br>";
		echo"<input type=".$a." onclick=".$b." value=".$c." />";
		echo"<br>";
		echo"<br>";
		echo"<form action='food3.php' form='post'>";
      		echo"Give us your feedback:<br>";
     		echo" <input type=".$d." name=".$e.">";
      		echo"<br>";
      		echo"<input type=".$f." value=".$f.">";
		echo"<br>";
		echo"	</form>";
			
			
		
}

else{
	echo "Select at least one item";
}







// close connection
mysqli_close($link);
?>
</div>
</body>
