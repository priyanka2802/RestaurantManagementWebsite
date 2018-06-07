
<?php
//Step1
session_start();
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<?php
//Step2
if(!empty(mysqli_real_escape_string($db, $_REQUEST['customer_id'])) && !empty(mysqli_real_escape_string($db, $_REQUEST['password'])))
{
$value1 = mysqli_real_escape_string($db, $_REQUEST['customer_id']);
$value2 = mysqli_real_escape_string($db, $_REQUEST['password']);
$query = "SELECT * FROM customer WHERE customer_id='".$value1."'";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
if($row != NULL){
	$value3 = $row['password'];
	$value4 = $row['Name'];
	if($value3 == $value2){
		$_SESSION['login_user']=$value4; 
		$_SESSION['cust_id']=$value1; 
		header("location: UserProfile.php");
	}
	else
		echo"Customer id and password do not match.";
}
else
	echo"Customer id does not exist.";
//Step 4
mysqli_close($db);
}
else {  
    echo "All fields are required!";  
} 
?>