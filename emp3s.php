
<?php
$link = mysqli_connect("localhost", "root", "cherry44jerry", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$value1 = mysqli_real_escape_string($link, $_REQUEST['Name']);
$value2 = mysqli_real_escape_string($link, $_REQUEST['Age']);
$value3 = mysqli_real_escape_string($link, $_REQUEST['Contact_no']);
$value4 = mysqli_real_escape_string($link, $_REQUEST['Address']);
$value5 = mysqli_real_escape_string($link, $_REQUEST['Salary']);
$value6 = mysqli_real_escape_string($link, $_REQUEST['Join_date']);
$value7 = mysqli_real_escape_string($link, $_REQUEST['Designation']);
$value8 = mysqli_real_escape_string($link, $_REQUEST['dept_id']);

// attempt insert query execution
$sql = "INSERT INTO employees(Name,
Age,Contact_no,
Address,
Salary,

Join_date,
Designation,
dept_id)

VALUES
('$value1','$value2','$value3','$value4','$value5','$value6','$value7','$value8')
";
if(mysqli_query($link, $sql)){
    echo "Insertion successful.";
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
 <head>
 </head>
 <body>
 <h3>New employee id is:</h3>

<?php
$query = "SELECT emp_id, dept_id FROM employees Order by emp_id desc limit 1";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
 echo $row['emp_id']."<br>";
mysqli_close($db);
?>



</body>
</html>