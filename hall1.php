<link href='styleh.css' rel='stylesheet' type='text/css'>
<body class="b1">
<div class="abcd">
<?php
//Step1
session_start();
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<?php
//Step2
date_default_timezone_set('Asia/Kolkata');
if(empty(mysqli_real_escape_string($db, $_REQUEST['date_and_time']))&&!isset($_POST['Dj'])&&!isset($_POST['Decoration'])&&!isset($_POST['Music system'])&&!isset($_POST['Cake and candles']))
{
	echo"Field must not be empty and at least one check box must be checked.";

}
else {  
 
$value1 = mysqli_real_escape_string($db, $_REQUEST['date_and_time']);
$val1 = 1000;
$user = $_SESSION['cust_id'];
$now = time(); // or your date as well
$your_date = strtotime($value1);
$datediff = $your_date - $now;
$diff = floor($datediff / (60 * 60 * 24));
	if($diff >= 1 && $diff <= 30){
		$query = "select Date_and_Time from books where Date_and_Time = '".$value1."'";
		mysqli_query($db, $query) or die('Error querying database.');
		$result = mysqli_query($db, $query);
		$val = mysqli_num_rows($result);
		if($val > 0){
			echo"Sorry, the event hall is already booked on the given time.";
		}

		else{
			if(isset($_GET['Dj'])){
			$value2 = "Dj";
			$val1 = $val1 + 1000;
			$sql1 = "INSERT INTO Books
(Facility,
customer_id,
Date_and_Time)

			VALUES
('$value2','$user','$value1')
";
			if(mysqli_query($db, $sql1)){
			} else{
    				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
				exit(0);
			}
			}
			if(isset($_GET['Decoration'])){
			$value3 = "Decoration";
			$val1 = $val1 + 500;
			$sql2 = "INSERT INTO Books
(Facility,
customer_id,
Date_and_Time)

			VALUES
('$value3','$user','$value1')
";
			if(mysqli_query($db, $sql2)){
			} else{
    				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
				exit(0);
			}
			}
			if(isset($_GET['Music system'])){
			$value4 = "Music system";
			$val1 = $val1 + 300;
			$sql3 = "INSERT INTO Books
(Facility,
customer_id,
Date_and_Time)

			VALUES
('$value4','$user','$value1')
";
			if(mysqli_query($db, $sql3)){
			} else{
    				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
				exit(0);
			}
			}
			if(isset($_GET['Cake and candles'])){
			$value5 = "Cake and candles";
			$val1 = $val1 + 500;
			$sql4 = "INSERT INTO Books
(Facility,
customer_id,
Date_and_Time)

			VALUES
('$value5','$user','$value1')
";
			if(mysqli_query($db, $sql4)){
			} else{
    				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
				exit(0);
			}
			}
		$query1 = "select Birth_date, Date_of_anniversary from customer where Customer_id = '".$user."'";
		mysqli_query($db, $query1) or die('Error querying database.');
		$result1 = mysqli_query($db, $query1);
		$row = mysqli_fetch_array($result1);
		$dt = new DateTime($value1);

		$date = $dt->format('m/d/Y');
		if($date == $row['Birth_date']){
			$discount = 0.25;
			echo"Congratulations! you have got discount of 25%<br>";
			echo"Happy birthday!<br>";
		
		}
		elseif($date == $row['Date_of_anniversary']){
			$discount = 0.25;
			echo"Congratulations! you have got discount of 25%<br>";
			echo"Happy anniversary!<br>";
		
		}
		else
			$discount = 0;
		$GST = 0.35;
		$a = "button";
		$b = "location.href='https://paytm.com/';";
		$c = "Paytm link";
		$d = "Text";
		$e = "Feedback";
		$f = "submit";
		$_SESSION['GST'] = $GST;
		$_SESSION['discount'] = $discount;
		$Amount = $val1 + ($val1*$GST) - ($val1*$discount);
		$_SESSION['Amount'] = $Amount;
		echo"Your total amount is Rs. ".$Amount." including ".$GST." GST.<br>";
		echo"Pay through Paytm:<br>";
		echo"<input type=".$a." onclick=".$b." value=".$c." />";
		echo"<br>";
		echo"<br>";
		echo"<form action='hall2.php' form='post'>";
      		echo"Give us your feedback:<br>";
     		echo" <input type=".$d." name=".$e.">";
      		echo"<br>";
      		echo"<input type=".$f." value=".$f.">";
		echo"<br>";
		echo"	</form>";
		
		}

	}
	else{
		echo"Event hall should be booked at least one day before and within one month of the event.";
	}
//Step 4
mysqli_close($db);    
} 
?>
</div>
</body>

