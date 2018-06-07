
<?php
//Step1
session_start();
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<?php
//Step2
$value1 = $_SESSION['field'];
$value3 = $_SESSION['emp_id'];
if(!empty(mysqli_real_escape_string($db, $_REQUEST[$value1])))
{
$value2 = mysqli_real_escape_string($db, $_REQUEST[$value1]);

$query = "update employees set ".$value1." = '".$value2."' where emp_id ='".$value3."'";
mysqli_query($db, $query) or die('Error querying database.');

echo"Update succesful.<br>";
//Step 4
mysqli_close($db);
}
else {  
    echo "Enter the value to update.<br>";  
} 
?>

<html>
<br>
<input type="button" onclick="location.href='emp2.html';" value="Update another value." />
<input type="button" onclick="location.href='AdminProfile.php';" value="Go to profile" />


</html>