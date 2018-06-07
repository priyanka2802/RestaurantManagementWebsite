
<?php
//Step1
session_start();
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<?php
//Step2
if(!empty(mysqli_real_escape_string($db, $_REQUEST['name'])) && !empty(mysqli_real_escape_string($db, $_REQUEST['password'])))
{
$value1 = mysqli_real_escape_string($db, $_REQUEST['name']);
$value2 = mysqli_real_escape_string($db, $_REQUEST['password']);
$query = "SELECT * FROM customer WHERE name='".$value1."'";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
if($row != NULL){
	$value3 = $row['password'];
	if($value3 == $value2){
		$_SESSION['login_user']=$value1; 
		header("location: AdminProfile.php");
	}
	else
		echo"Name and password do not match.";
}
else
	echo"Name is incorrect.";
//Step 4
mysqli_close($db);
}
else {  
    echo "All fields are required!";  
} 
?>