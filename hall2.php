
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

		$GST = $_SESSION['GST'];
		$discount = $_SESSION['discount'];
		$Amount = $_SESSION['Amount'];
// attempt insert query execution
$sql = "INSERT INTO Payment_and_feedback
(Amount,
Discount,
GST,
Overall_feedback,
Mode_of_payment,

date_and_time, customer_id)

VALUES
('$Amount','$discount','$GST','$x','$y','$z', '$user')
";
if(mysqli_query($link, $sql)){
    echo "Thank you for booking!<br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
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
<link href='styleh.css' rel='stylesheet' type='text/css'>
 <head>
 </head>
 <body class="b1">
 <h2>Your bill no is:</h2>
<div class="abcd">

<?php
$query = "SELECT Bill_no FROM Payment_and_feedback Order by Bill_no desc limit 1";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
 echo $row['Bill_no']."<br>";
mysqli_close($db);
?>

<input type="button" onclick="location.href='UserProfile.php';" value="Go to user profile" />
</div>
</body>
</html>
