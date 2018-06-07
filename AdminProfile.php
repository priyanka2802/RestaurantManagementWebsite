<html>
<link href='style.css' rel='stylesheet' type='text/css'>
<title>AdminProfile.php</title>
<body class="b2">
<?php
session_start();
$username = $_SESSION['login_user']; //retrieve the session variable
?>
<center><h1>Admin Profile </h1></center>
<br/>
<b>Welcome <?php echo $username ?> </b>
<div style="text-align: right"><a href="Logout.php">Logout</a></div> <!-- calling Logout.php to destroy the session -->
<?php
if(!isset($_SESSION['login_user'])) //If user is not logged in then he cannot access the profile page
{
//echo 'You are not logged in. <a href="adminvalidate.php">Click here</a> to log in.';
header("location:index.html");
}
?>
<div class="main2">
<br>
<a class="h" href="emp.html">1.Employee information</a>
<br>
<a class="f" href="cust.html">2.Customer information </a>
<br>
</div>
</body>
</html>

