
<?php
$link = mysqli_connect("localhost", "root", "cherry44jerry", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 if(!empty(mysqli_real_escape_string($link, $_REQUEST['Cuisine_name']))&&!empty(mysqli_real_escape_string($link, $_REQUEST['Name']))&&!empty(mysqli_real_escape_string($link, $_REQUEST['Cost'])))
{// Escape user inputs for security
$value1 = mysqli_real_escape_string($link, $_REQUEST['Name']);
$value2 = mysqli_real_escape_string($link, $_REQUEST['Cost']);
$value3 = mysqli_real_escape_string($link, $_REQUEST['Cuisine_name']);
if($value3 == "North indian" || $value3 == "Chinese" ||$value3 == "Continental"||$value3 == "South indian")
{// attempt insert query execution
$sql = "INSERT INTO food_items(Food_name,
cost,cuisine_name)

VALUES
('$value1','$value2','$value3')
";
if(mysqli_query($link, $sql)){
    echo "Insertion successful.<br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	exit(0);
}}
else{
	echo "Write proper cuisine name.<br>";
}
}
else{
	echo "All fields must be filled.<br>";
}
 
// close connection
mysqli_close($link);
?>

<html>

<input type="button" onclick="location.href='addFood.html';" value="Add another food item" />
<input type="button" onclick="location.href='AdminProfile.php';" value="Go to profile" />


</html>