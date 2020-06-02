<?php
include "SQL.php";
$tables = mysqli_query($mysqli, "SELECT * FROM `booktable`");
$freeTable = true;
$check = 0;
$checkTable = 0;
$massege_1= '<h2>Application sent</h2>
						<h3>Thank you for your choice.</h3>
						<img src="image/Shape_3.png" alt="">
						<p> Reservation request sent, now our server processes your data, as well as your order, and as soon as processing is completed you will be called our administrator to confirm the order and clarify small details on the menu, design and more.</p>';
$massege_2='<h1>An error occurred while sending the message !!! Please retry the request.</h1>';
$massege_3= '<h1>Sorry, but all the tables for the reserve for this number are occupied.</h1>';
if (isset($_POST['name'])) {  $name = $_POST['name']; if ($name == "") { 	unset($name); }}
if (isset($_POST['phone'])) {  $phone = $_POST['phone']; if ($phone == "") { 	unset($phone); }}
if (isset($_POST['people'])) {  $people = $_POST['people']; if ($people == "") { 	unset($people); }}
if (isset($_POST['date'])) {  $dateTable = $_POST['date']; if ($dateTable == "") { 	unset($dateTable); }}
if (isset($_POST['time'])) {  $time = $_POST['time']; if ($time == "") { 	unset($time); }}
if (isset($_POST['table'])) {  $Table = $_POST['table']; if ($Table == "") { 	unset($Table); }}
while ($table = mysqli_fetch_assoc($tables)) {if ($table[date] == $dateTable) {$checkTable = $checkTable + $table[table];}}
if($people < 5 && $Table == "Yes"){	$check = 1;}
else if($people > 4 && $people < 7 && $Table == "Yes"){	$check= 2 ;}
else if($people > 6 && $Table == "Yes"){ $check = 3;}
$checkTable = $check + $checkTable;?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sending</title>
	<link rel="stylesheet" href="database.css">
</head>
<body>
				<div class="dataBase"><div class="text"> 							
		     <?php if ($checkTable <= 50) {
						$bookTable = mysqli_query($mysqli, "INSERT INTO `booktable`(`ID`, `name`, `phone`, `people`, `date`, `time`, `table`) VALUES  (NULL, '$name', '$phone', '$people', '$dateTable', '$time', '$check')");
 						if ($bookTable == true) {echo $massege_1;}
 						else { echo $massege_2;}}
 						else {echo $massege_3;}?>
						<a href="index.php"> Go back to main page</a>
						</div></div>
</body>
</html>

