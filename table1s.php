<link href='stylet.css' rel='stylesheet' type='text/css'>
<body class="table">
<div class="itable">
<?php
//Step1
session_start();
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<?php
//Step2
date_default_timezone_set('Asia/Kolkata');
if(!empty(mysqli_real_escape_string($db, $_REQUEST['time_reserved']))&&!empty(mysqli_real_escape_string($db, $_REQUEST['time_reserved'])))
{
$value1 = mysqli_real_escape_string($db, $_REQUEST['dining_hall']);
$value2 = mysqli_real_escape_string($db, $_REQUEST['time_reserved']);
$val = "number";
$val1 = "table_id";
$val2 = "submit";
$diff = strtotime($value2) - strtotime(date('H:i'));
	if($diff >= 3600){
		$_SESSION['dining_hall_name'] = $value1;
		$_SESSION['time_reserved'] = $value2;
		$t1 = "07:00";
		$t3 = "12:00";
		$t5 = "19:00";
		$t6 = "23:00";
		$curT = $value2;
		if(($value1 == "A/C hall" )||($value1 == "non A/C hall" )||($value1 == "Garden terrace")){
			if(($value1 == "A/C hall" && $curT > $t3 && $curT < $t6)||($value1 == "non A/C hall" && $curT > $t1 && $curT < $t6 )||($value1 == "Garden terrace" && $curT > $t5 && $curT < $t6)){
				echo"Tables available with the table ids and corresponding number of seats are:<br>";
		
			$query = "select table_id, No_of_seats from tables where dining_hall_name = '".$value1."' and table_id 
	not in(select table_id from reserves where hour(time_reserved) = hour('".$value1."') and date_reserved = curdate())";
			mysqli_query($db, $query) or die('Error querying database.');
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);
			echo $row['table_id'].', '.$row['No_of_seats'] .'<br />';
			while ($row = mysqli_fetch_array($result)) {
	 			echo $row['table_id'].', '.$row['No_of_seats'] .'<br />';
			}
			
			echo"<br>";
			echo"<form action='table2s.php' form='post'>";
	      		echo"Enter the table id:<br>";
	     		echo" <input type=".$val." name=".$val1.">";
	      		echo"<br>";
	      		echo"<input type=".$val2." value=".$val2.">";
			echo"	</form>";
			}
			else{
				echo"Please choose dining hall according to the timings.";
			}
		}
		else{
			echo"Please write the proper dining hall name.";
		}

	}
	else{
		echo"Table should be reserved at least one hour before";
	}
//Step 4
mysqli_close($db);
}
else {  
    echo "All fields must be filled.";  
} 
?>
</div>
</body>
