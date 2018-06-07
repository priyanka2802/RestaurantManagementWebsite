
<?php
//Step1
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
 <h1>Last 10 signups</h1>

<?php
//Step2
$query = "SELECT * FROM customer order by customer_id desc limit 10";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
echo"<h3>Customer_id, Name, Birth date, Date of anniversary, Address</h3>";
	
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
echo $row['Customer_id'] . ', ' . $row['Name'] . ', ' . $row['Birth_date'] .', ' . $row['Date_of_anniversary'] .', ' . $row['Apt_number'] .', ' . $row['Street_name'] .', ' . $row['Street_number'] .', ' . $row['Pin_code'] .'<br />';
while ($row = mysqli_fetch_array($result)) {
 echo $row['Customer_id'] . ', ' . $row['Name'] . ', ' . $row['Birth_date'] .', ' . $row['Date_of_anniversary'] .', ' . $row['Apt_number'] .', ' . $row['Street_name'] .', ' . $row['Street_number'] .', ' . $row['Pin_code'] .'<br />';
}
//Step 4
mysqli_close($db);
?>

</body>
</html>