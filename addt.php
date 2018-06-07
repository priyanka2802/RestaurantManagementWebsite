
<?php
$link = mysqli_connect("localhost", "root", "cherry44jerry", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 if(!empty(mysqli_real_escape_string($link, $_REQUEST['No_seats']))&&!empty(mysqli_real_escape_string($link, $_REQUEST['Dining_hall'])))
{// Escape user inputs for security
$value3 = mysqli_real_escape_string($link, $_REQUEST['Dining_hall']);
$value2 = mysqli_real_escape_string($link, $_REQUEST['No_seats']);
if($value3 == "A/C hall" || $value3 == "non A/C hall" ||$value3 == "Garden terrace")
{// attempt insert query execution
$sql = "INSERT INTO tables  (No_of_seats, Dining_hall_name ) values 
('$value2','$value3')
";
if(mysqli_query($link, $sql)){
    echo "Insertion successful.<br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	exit(0);
}}
else{
	echo "Write proper dining hall name.<br>";
}
}
else{
	echo "All fields must be filled.<br>";
}
 
// close connection
mysqli_close($link);
?>

<html>

<input type="button" onclick="location.href='addTable.html';" value="Add another table" />
<input type="button" onclick="location.href='AdminProfile.php';" value="Go to profile" />


</html>