
<?php
//Step1
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
 <h1>Today's bills and feedbacks</h1>

<?php
//Step2
$query = "select * from payment_and_feedback where date(date_and_time) = curdate();";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
echo"<h3>Bill_no, Customer id, Amount, Discount, Delivery charges, GST, Overall feedback, Mode of payment, Date and time</h3>";
	
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
echo $row['Bill_no'] . ', ' . $row['customer_id'] . ', ' . $row['Amount'] .', ' . $row['Discount'] .', ' . $row['Delivery_charges'] .', ' . $row['GST'] .', ' . $row['Overall_feedback'] .', ' . $row['Mode_of_payment'] .', ' . $row['date_and_time'] .'<br />';
while ($row = mysqli_fetch_array($result)) {
 echo $row['Bill_no'] . ', ' . $row['customer_id'] . ', ' . $row['Amount'] .', ' . $row['Discount'] .', ' . $row['Delivery_charges'] .', ' . $row['GST'] .', ' . $row['Overall_feedback'] .', ' . $row['Mode_of_payment'] .', ' . $row['date_and_time'] .'<br />';
}
//Step 4
mysqli_close($db);
?>

</body>
</html>