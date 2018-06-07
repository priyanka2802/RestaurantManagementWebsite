

<?php
//Step1
session_start();
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<?php
//Step2
if(!empty(mysqli_real_escape_string($db, $_REQUEST['emp_id'])))
{
$value1 = mysqli_real_escape_string($db, $_REQUEST['emp_id']);

$query = "select * from employees where emp_id = '".$value1."'";
mysqli_query($db, $query) or die('Employee id does not exist.');

//Step3
$result = mysqli_query($db, $query);
$num = mysqli_num_rows($result);
	if($num == 0){
		echo"Employee id does not exist.";
	}
	else{
echo"<h3>Employee_id, Name, Age, Contact_no, Address, Salary, Join_date, Designation </h3>";
	
$row = mysqli_fetch_array($result);
echo $row['Emp_id'].', '.$row['Name'] . ', ' . $row['Age'].', ' .$row['Contact_no'].', '.$row['Address'].', '.$row['Salary'].', '.$row['Join_date'].', '.$row['Designation'].'<br />';

$query1 ="delete from employees where emp_id = '".$value1."'";
mysqli_query($db, $query1) or die('Error querying database.');
echo "<br>This employee is deleted.";}
mysqli_close($db);
}
else {  
    echo "Enter the employee id.";  
} 
?>