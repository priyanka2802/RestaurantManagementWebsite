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
	$val = "text";
	$val1 = "Field";
	$val2 = "submit";
	$query = "select * from employees where emp_id = '".$value1."'";
	mysqli_query($db, $query) or die('Error querying database.');

	$result = mysqli_query($db, $query);
	$num = mysqli_num_rows($result);
	if($num == 0){
		echo"Employee id does not exist.";
	}
	else{
	echo"<h3>Name, Age, Contact_no, Address, Salary, Join_date, Designation </h3>";
	
	$row = mysqli_fetch_array($result);
	
	echo $row['Name'] . ', ' . $row['Age'].', ' .$row['Contact_no'].', '.$row['Address'].', '.$row['Salary'].', '.$row['Join_date'].', '.$row['Designation'].'<br />';
	echo"What do you want to edit?<br>";
	echo"<form action='emp21s.php' form='post'>";
      		echo"Enter the field:<br>";
     		echo" <input type=".$val." name=".$val1.">";
      		echo"<br>";
      		echo"<input type=".$val2." value=".$val2.">";
		echo"	</form>";
	$_SESSION['emp_id'] = $value1;
	}


//Step 4
mysqli_close($db);
}
else {  
    echo "Enter the employee id.";  
} 
?>