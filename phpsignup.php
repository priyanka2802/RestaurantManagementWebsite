
<?php
$link = mysqli_connect("localhost", "root", "cherry44jerry", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$value1 = mysqli_real_escape_string($link, $_REQUEST['Name']);
$value2 = mysqli_real_escape_string($link, $_REQUEST['apt_number']);
$value3 = mysqli_real_escape_string($link, $_REQUEST['street_number']);
$value4 = mysqli_real_escape_string($link, $_REQUEST['street_name']);
$value5 = mysqli_real_escape_string($link, $_REQUEST['pincode']);
$value6 = mysqli_real_escape_string($link, $_REQUEST['birthdate']);
$value7 = mysqli_real_escape_string($link, $_REQUEST['anniversary_date']);
$value8 = mysqli_real_escape_string($link, $_REQUEST['psw']);

// attempt insert query execution
$sql = "INSERT INTO customer
(Name,
Birth_date,
Date_of_anniversary,
Apt_number,
Street_name,

Street_number,
Pin_code,
password)

VALUES
('$value1','$value6','$value7','$value2','$value4','$value3','$value5','$value8')
";
if(mysqli_query($link, $sql)){
    echo "Signup successful.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
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
 <h3>Your customer id is:</h3>

<?php
$query = "SELECT customer_id FROM customer Order by customer_id desc limit 1";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
 echo $row['customer_id']."<br>";
mysqli_close($db);
?>

<input type="button" onclick="location.href='index.html';" value="Go to Sign in page" />

</body>
</html>