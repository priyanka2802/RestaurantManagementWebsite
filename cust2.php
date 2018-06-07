
<?php
//Step1
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
 <h1>Today's reserves</h1>

<?php
//Step2
$query = "SELECT * FROM reserves where date_reserved = curdate()";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
echo"<h3>Customer_id, Table_id, Time reserved</h3>";
	
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
echo $row['customer_id'] . ', ' . $row['Table_id'] . ', ' . $row['time_reserved'] .'<br />';
while ($row = mysqli_fetch_array($result)) {
 echo $row['customer_id'] . ', ' . $row['Table_id'] . ', ' . $row['time_reserved'] .'<br />';
}
//Step 4
mysqli_close($db);
?>

</body>
</html>