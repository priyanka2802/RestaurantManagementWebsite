<link href='stylef.css' rel='stylesheet' type='text/css'>
<body class="b1">
<div class="abcd">
<?php
session_start();
$link = mysqli_connect("localhost", "root", "cherry44jerry", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$meal_type = $_GET["Meal_type"];
date_default_timezone_set('Asia/Kolkata');
$curT = date('H:i');
$t1 = "07:00";
$t2 = "10:00";
$t3 = "12:00";
$t4 = "14:30";
$t5 = "19:30";
$t6 = "23:00";

$query = "select food_items.food_id,food_name, cost, cuisine_name from food_items join meal_items 
on food_items.Food_id = meal_items.Food_id where
 Meal_type = '".$meal_type."'";
mysqli_query($link, $query) or die('Error querying database.');
$result = mysqli_query($link, $query);

if(($meal_type == "Breakfast" && $curT > $t1 && $curT < $t2)||($meal_type == "Lunch" && $curT > $t3 && $curT < $t4 )||($meal_type == "Dinner" && $curT > $t5 && $curT < $t6)||($meal_type == "Snacks" && $curT > $t1 && $curT < $t6)){
echo "<form action='food2.php' method='post'>";
echo "Food item ,Cuisine type, Cost<br>";
echo "<br>";

while ($row = mysqli_fetch_array($result)) {
  echo "<input type='checkbox' name='check_list[]' value=".$row['food_id'].">";
  echo $row['food_name'].', '.$row['cuisine_name'].', Rs. '.$row['cost'] ;
echo "<br>";
}	
echo"<br>";
echo"Mode of order:";
echo"<br>";
echo"<select name='Mode_of_order'>";
  echo"<option value='Online'>Online</option>";
  echo"<option value='Offline'>Offline</option>";
echo"</select>";
echo "<br>";
echo "<input type='submit' />";
echo "<br>";
echo "</form>";

}

else{
	echo"Please choose the meal type according to time.<br>";
}

// close connection
mysqli_close($link);
?>
</div>
</body>
