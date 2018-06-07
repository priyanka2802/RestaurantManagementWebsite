
<?php
//Step1
session_start();
 $db = mysqli_connect('localhost','root','cherry44jerry','project')
 or die('Error connecting to MySQL server.');
?>

<?php
//Step2
if(!empty(mysqli_real_escape_string($db, $_REQUEST['dept_name'])))
{
$value1 = mysqli_real_escape_string($db, $_REQUEST['dept_name']);
if($value1 == "Management"){
	$query = "select * from employees join departments on departments.Dept_id = employees.Dept_id where departments.Dept_name ='".$value1."'";
	mysqli_query($db, $query) or die('Error querying database.');

	echo"<h3>Employee_id, Name, Age, Contact_no, Address, Salary, Join_date, Designation </h3>";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_array($result);
	echo $row['Emp_id'].', '.$row['Name'] . ', ' . $row['Age'].', ' .$row['Contact_no'].', '.$row['Address'].', '.$row['Salary'].', '.$row['Join_date'].', '.$row['Designation'].'<br />';
	while ($row = mysqli_fetch_array($result)) {
 		echo $row['Emp_id'].', '.$row['Name'] . ', ' . $row['Age'].', ' .$row['Contact_no'].', '.$row['Address'].', '.$row['Salary'].', '.$row['Join_date'].', '.$row['Designation'].'<br />';
	}

}

else if($value1 == "Cooking"){
	$query = "select * from employees join departments on departments.Dept_id = employees.Dept_id join chefs on chefs.emp_id = employees.emp_id where departments.Dept_name ='".$value1."'";
	mysqli_query($db, $query) or die('Error querying database.');

	echo"<h3>Employee_id, Name, Age, Contact_no, Address, Salary, Join_date, Designation, Cuisine name </h3>";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_array($result);
	echo $row['Emp_id'].', '.$row['Name'] . ', ' . $row['Age'].', ' .$row['Contact_no'].', '.$row['Address'].', '.$row['Salary'].', '.$row['Join_date'].', '.$row['Designation'].', '.$row['Cuisine_name'].'<br />';
	while ($row = mysqli_fetch_array($result)) {
 		echo $row['Emp_id'].', '.$row['Name'] . ', ' . $row['Age'].', ' .$row['Contact_no'].', '.$row['Address'].', '.$row['Salary'].', '.$row['Join_date'].', '.$row['Designation'].', '.$row['Cuisine_name'].'<br />';
	}

}

else if($value1 == "Service"){
	$query = "select * from employees join departments on departments.Dept_id = employees.Dept_id join dining_halls on dining_halls.Emp_id = employees.Emp_id where departments.Dept_name ='".$value1."'";
	mysqli_query($db, $query) or die('Error querying database.');

	echo"<h3>Employee_id, Name, Age, Contact_no, Address, Salary, Join_date, Designation, Dining hall name </h3>";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_array($result);
	echo $row['Emp_id'].', '.$row['Name'] . ', ' . $row['Age'].', ' .$row['Contact_no'].', '.$row['Address'].', '.$row['Salary'].', '.$row['Join_date'].', '.$row['Designation'].', '.$row['Dining_hall_name'].'<br />';
	while ($row = mysqli_fetch_array($result)) {
 		echo $row['Emp_id'].', '.$row['Name'] . ', ' . $row['Age'].', ' .$row['Contact_no'].', '.$row['Address'].', '.$row['Salary'].', '.$row['Join_date'].', '.$row['Designation'].', '.$row['Dining_hall_name'].'<br />';
	}
	$query1 = "select * from employees join departments on departments.Dept_id = employees.Dept_id join waiters_and_cleaners on waiters_and_cleaners.Emp_id = employees.Emp_id where departments.Dept_name ='".$value1."'";
	mysqli_query($db, $query1) or die('Error querying database.');
	$result1 = mysqli_query($db, $query1);
	$row1 = mysqli_fetch_array($result1);
	echo $row1['Emp_id'].', '.$row1['Name'] . ', ' . $row1['Age'].', ' .$row1['Contact_no'].', '.$row1['Address'].', '.$row1['Salary'].', '.$row1['Join_date'].', '.$row1['Designation'].', '.$row1['Dining_hall_name'].'<br />';
	while ($row1 = mysqli_fetch_array($result1)) {
 		echo $row1['Emp_id'].', '.$row1['Name'] . ', ' . $row1['Age'].', ' .$row1['Contact_no'].', '.$row1['Address'].', '.$row1['Salary'].', '.$row1['Join_date'].', '.$row1['Designation'].', '.$row1['Dining_hall_name'].'<br />';
	}
}

else if($value1 == "House keeping"){
	$query1 = "select * from employees join departments on departments.Dept_id = employees.Dept_id join waiters_and_cleaners on waiters_and_cleaners.Emp_id = employees.Emp_id where departments.Dept_name ='".$value1."'";
	mysqli_query($db, $query1) or die('Error querying database.');
	$result1 = mysqli_query($db, $query1);
	echo"<h3>Employee_id, Name, Age, Contact_no, Address, Salary, Join_date, Designation, Dining hall name </h3>";
	$row1 = mysqli_fetch_array($result1);
	echo $row1['Emp_id'].', '.$row1['Name'] . ', ' . $row1['Age'].', ' .$row1['Contact_no'].', '.$row1['Address'].', '.$row1['Salary'].', '.$row1['Join_date'].', '.$row1['Designation'].', '.$row1['Dining_hall_name'].'<br />';
	while ($row1 = mysqli_fetch_array($result1)) {
 		echo $row1['Emp_id'].', '.$row1['Name'] . ', ' . $row1['Age'].', ' .$row1['Contact_no'].', '.$row1['Address'].', '.$row1['Salary'].', '.$row1['Join_date'].', '.$row1['Designation'].', '.$row1['Dining_hall_name'].'<br />';
	}

}

else if($value1 == "Online order"){
	$query1 = "select * from employees join departments on departments.Dept_id = employees.Dept_id join 
delivery_persons on delivery_persons.Emp_id = employees.Emp_id join area on area.Area_code = delivery_persons.Area_code  where departments.Dept_name ='".$value1."'";
	mysqli_query($db, $query1) or die('Error querying database.');
	$result1 = mysqli_query($db, $query1);
	echo"<h3>Employee_id, Name, Age, Contact_no, Address, Salary, Join_date, Designation, Area pin code, Vehicle number </h3>";
	$row1 = mysqli_fetch_array($result1);
	echo $row1['Emp_id'].', '.$row1['Name'] . ', ' . $row1['Age'].', ' .$row1['Contact_no'].', '.$row1['Address'].', '.$row1['Salary'].', '.$row1['Join_date'].', '.$row1['Designation'].', '.$row1['Pin_code'].', '.$row1['Vehicle_no'].'<br />';
	while ($row1 = mysqli_fetch_array($result1)) {
 		echo $row1['Emp_id'].', '.$row1['Name'] . ', ' . $row1['Age'].', ' .$row1['Contact_no'].', '.$row1['Address'].', '.$row1['Salary'].', '.$row1['Join_date'].', '.$row1['Designation'].', '.$row1['Pin_code'].', '.$row1['Vehicle_no'].'<br />';
	}

}
else{
	echo "Enter proper department name.";
}
//Step 4
mysqli_close($db);
}
else {  
    echo "Enter the department name.";  
} 
?>