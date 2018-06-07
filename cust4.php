
<?php
//Step1
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
 <h1>Today's event hall bookings</h1>

<?php
//Step2
$query = "SELECT * FROM books where date(date_and_time) = curdate()";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
echo"<h3>Customer_id, Facility booked, Time reserved</h3>";
	
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
echo $row['customer_id'] . ', ' . $row['Facility'] . ', ' . $row['Date_and_Time'] .'<br />';
while ($row = mysqli_fetch_array($result)) {
 echo $row['customer_id'] . ', ' . $row['Facility'] . ', ' . $row['Date_and_Time'] .'<br />';
}
//Step 4
mysqli_close($db);
?>

</body>
</html>