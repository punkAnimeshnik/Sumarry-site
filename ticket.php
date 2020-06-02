<?php
include "SQL.php";
$tickets = mysqli_query($mysqli, "SELECT * FROM `ticket_event`");
$freeTable = true;
$check = 1;
$checkTable = 0;
$massege_1= '<h2>Ticket reserved</h2>
						<h3>Thank you for your choice.</h3>
						<img src="image/Shape_3.png" alt="">
						<p> Yourthe ticket is reserved, now our server processes your data to prepare the table,
						 we hope you enjoy this event, and also wish you a pleasant time.</p>';
$massege_2='<h1>An error occurred while sending the message !!! Please retry the request.</h1>';
$massege_3= '<h1>Sorry, but all the ticket for the reserve for this event are occupied.</h1>';
if (isset($_POST['name'])) {  $name = $_POST['name']; if ($name == "") { 	unset($name); }}
if (isset($_POST['people'])) {  $people = $_POST['people']; if ($people == "") { 	unset($people); }}
if (isset($_POST['date'])) {  $dateTicket = $_POST['date']; if ($dateTicket == "") { 	unset($dateTicket); }}
if (isset($_POST['time'])) {  $time = $_POST['time']; if ($time == "") { 	unset($time); }}
if (isset($_POST['table'])) {  $Table = $_POST['table']; if ($Table == "") { 	unset($Table); }}
while ($ticket = mysqli_fetch_assoc($tickets)) {if ($ticket[date] == $dateTicket) {	$checkTable = $checkTable + $ticket[table_event];}}
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
		<?php 	if ($checkTable <= 100) {
						$eventTicket = mysqli_query($mysqli, "INSERT INTO `ticket_event`(`name`, `people`, `date`, `time`, `table_event`) VALUES  ('$name', '$people', '$dateTicket', '$time', '$check')");
 						if ($eventTicket == true) {
  				  echo $massege_1;}
 				    else {	echo $massege_2;}}
 					  else {echo $massege_3;}?>
						<a href="index.php"> Go back to main page</a>
						</div></div>
</body>
</html>