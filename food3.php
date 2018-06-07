
<?php

session_start();
$link = mysqli_connect("localhost", "root", "cherry44jerry", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
if(!empty(mysqli_real_escape_string($link, $_REQUEST['Feedback']))){
	$x = "";
}
else
$x = mysqli_real_escape_string($link, $_REQUEST['Feedback']);
$y = "Online";
$z = date('Y-m-d H:i:s');
$user = $_SESSION['cust_id'];
$del = $_SESSION['delC'];

		$GST = $_SESSION['GST1'];
		$discount = $_SESSION['discount1'];
		$Amount = $_SESSION['Amount1'];
// attempt insert query execution
$sql = "INSERT INTO Payment_and_feedback
(Amount,
Discount,
GST,
Overall_feedback,
Mode_of_payment,

date_and_time, customer_id, delivery_charges)

VALUES
($Amount,$discount,$GST,'$x','$y','$z', $user, $del)
";
if(mysqli_query($link, $sql)){
    echo "Thank you for booking!<br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    exit(0);
}
 
// close connection
mysqli_close($link);
?>

<?php
//Step1
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<html>
<link href='stylef.css' rel='stylesheet' type='text/css'>

 <head>
 </head>
 <body class="b1">
<div class="abcd">

<?php


$query = "SELECT Bill_no FROM Payment_and_feedback Order by Bill_no desc limit 1";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
 echo "Your bill no. is: ".$row['Bill_no']."<br>";

$mode11 = $_SESSION['mode'];
if($mode11 == "Online"){
	$veh = $_SESSION['vehicle'];
	echo"Your order will be delivered within 30 minutes. Vehicle number of the delivery person is ".$veh.".";
	echo"<br> For any query, contact us on: 9890176546";
	echo"<br>";
	echo"<br>";

} 
mysqli_close($db);
?>

<input type="button" onclick="location.href='UserProfile.php';" value="Go to user profile" />
</div>
</body>
</html>
