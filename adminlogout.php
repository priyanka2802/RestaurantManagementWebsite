
<?php 
session_start();
$username = $_SESSION['login_user']; //retrieve the session variable
unset($_SESSION['login_user']); //to remove session variable
session_destroy(); //destroy the session
header("location: index.html"); //to redirect back to "Login.php" after logging out
exit();
if(!isset($_SESSION['login_user'])) //If user is not logged in then he cannot access the profile page
{
//echo 'You are not logged in. <a href="adminvalidate.php">Click here</a> to log in.';
header("location:index.html");
}
?>