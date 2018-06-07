
<?php
//Step1
session_start();
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<?php
//Step2
$value1 = $_SESSION['field'];
$value3 = $_SESSION['cust_id'];
if(!empty(mysqli_real_escape_string($db, $_REQUEST[$value1])))
{
$value2 = mysqli_real_escape_string($db, $_REQUEST[$value1]);

$query = "update customer set ".$value1."= '".$value2."' where Customer_id ='".$value3."'";
mysqli_query($db, $query) or die('Error querying database.');

echo"Update succesful.<br>";
if($value1 == "Name"){
	$_SESSION['login_user'] = $value2;
}
//Step 4
mysqli_close($db);
}
else {  
    echo "Enter the value to update.<br>";  
} 
?>

<html>

<input type="button" onclick="location.href='info.html';" value="Update another value." />
<input type="button" onclick="location.href='UserProfile.php';" value="Go to user profile" />


</html>