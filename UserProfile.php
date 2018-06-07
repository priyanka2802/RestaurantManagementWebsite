<html>

<link href='style.css' rel='stylesheet' type='text/css'>
<title>userProfile.php</title>

<body class="b1">
<?php
session_start();
$username = $_SESSION['login_user']; //retrieve the session variable
?>
<center><h1>User Profile </h1></center>


Welcome <?php echo $username ?> 
<div style="text-align: right"><a href="Logout.php">Logout</a></div> <!-- calling Logout.php to destroy the session -->
<?php
if(!isset($_SESSION['login_user'])) //If user is not logged in then he cannot access the profile page
{
//echo 'You are not logged in. <a href="validate.php">Click here</a> to log in.';
header("location:index.html");
}
?>
<div class="main1">
<br>
<a class="f" href="food.html">1.Food ordering</a>
<br>
<a class="r" href="table.html">2.Reservation of tables</a>
<br>
<a class="e" href="hall.html">3.Event hall booking</a>
<br>
<a class="u" href="info.html">4.Update information</a>
<br>
</div>
</body>
</html>
