
<?php
session_start();
$link = mysqli_connect("localhost", "root", "cherry44jerry", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
if(1){
$value1 = $_GET["Information"];
$value2 = "text";
$value3 = "submit";
$value4 = "date";
$value5 = "number";
$_SESSION['field'] = $value1;
if($value1 == "Name" || $value1 == "Street_name"){

	echo"<form action='info2s.php' form='post'>";
     echo" Enter the new value for ".$value1.":<br>";
      echo"<input type=".$value2." name=".$value1.">";
      echo"<br>";
      echo"<input type=".$value3." value=".$value3.">";
	echo"</form>";

}
 
if($value1 == "Birth_date" || $value1 == "Date_of_anniversary"){

	echo"<form action='info2s.php' form='post'>";
     echo" Enter the new value for ".$value1.":<br>";
      echo"<input type=".$value4." name=".$value1.">";
      echo"<br>";
      echo"<input type=".$value3." value=".$value3.">";
	echo"</form>";

}

if($value1 == "password"){

	echo"<form action='info2s.php' form='post'>";
     echo" Enter the new value for ".$value1.":<br>";
      echo"<input type=".$value1." name=".$value1.">";
      echo"<br>";
      echo"<input type=".$value3." value=".$value3.">";
	echo"</form>";

}

if($value1 == "Apt_number" || $value1 == "Street_number" || $value1 == "Pin_code"){

	echo"<form action='info2s.php' form='post'>";
     echo" Enter the new value for ".$value1.":<br>";
      echo"<input type=".$value5." name=".$value1.">";
      echo"<br>";
      echo"<input type=".$value3." value=".$value3.">";
	echo"</form>";

}
}

else
echo"Enter the field name.";

// close connection
mysqli_close($link);
?>