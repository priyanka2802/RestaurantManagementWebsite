
<?php
session_start();
$link = mysqli_connect("localhost", "root", "cherry44jerry", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
if(!empty(mysqli_real_escape_string($link, $_REQUEST['Field']))){
$value1 = mysqli_real_escape_string($link, $_REQUEST['Field']);
$value2 = "text";
$value3 = "submit";
$value4 = "date";
$value5 = "number";
$_SESSION['field'] = $value1;
if($value1 == "Name" || $value1 == "Address" || $value1 == "Designation"){

	echo"<form action='emp22s.php' form='post'>";
     echo" Enter the new value for ".$value1.":<br>";
      echo"<input type=".$value2." name=".$value1.">";
      echo"<br>";
      echo"<input type=".$value3." value=".$value3.">";
	echo"</form>";

}
 
else if($value1 == "Join_date"){

	echo"<form action='emp22s.php' form='post'>";
     echo" Enter the new value for ".$value1.":<br>";
      echo"<input type=".$value4." name=".$value1.">";
      echo"<br>";
      echo"<input type=".$value3." value=".$value3.">";
	echo"</form>";

}

else if($value1 == "Age" || $value1 == "Contact_no" || $value1 == "Salary"){

	echo"<form action='emp22s.php' form='post'>";
     echo" Enter the new value for ".$value1.":<br>";
      echo"<input type=".$value5." name=".$value1.">";
      echo"<br>";
      echo"<input type=".$value3." value=".$value3.">";
	echo"</form>";

}
else
	echo"Enter the proper field name.";
}

else
echo"Enter the field name.";

// close connection
mysqli_close($link);
?>