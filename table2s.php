
<?php
session_start();
$link = mysqli_connect("localhost", "root", "cherry44jerry", "project");
$user = $_SESSION['cust_id'];
$time = $_SESSION['time_reserved'];
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$value1 = mysqli_real_escape_string($link, $_REQUEST['table_id']);

// attempt insert query execution
$sql = "INSERT INTO reserves 
VALUES
('$user','$value1','$time',curdate())
";
if(mysqli_query($link, $sql)){
    echo "Table reserved succesfully.";
	echo"<br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
<link href='stylet.css' rel='stylesheet' type='text/css'>

<html>
<body class="table">
<div class="itable">
<input type="button" onclick="location.href='table.html';" value="Reserve another table" />
<input type="button" onclick="location.href='UserProfile.php';" value="Go to user profile" />


</html>
