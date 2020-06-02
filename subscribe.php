<?php
include 'SQL.php';
$email = $_POST['email'];
$sub= 1;
$name = "";
$mess ="";
if (!empty($email)) {
$people_email = mysqli_prepare($mysqli, "SELECT `e-mail` FROM `people` WHERE `e-mail` = ? Limit 1");
$people_email-> bind_param("s", $email);
$people_email-> execute();
$people_email-> bind_result($email);
$people_email-> store_result();
$rnum_email = $people_email->num_rows;
$people_sub = mysqli_prepare($mysqli, "SELECT `e-mail` FROM `people` WHERE `e-mail` = ? AND `subscription` = 1 Limit 1");
$people_sub-> bind_param("s", $email);
$people_sub-> execute();
$people_sub-> bind_result($email);
$people_sub-> store_result();
$rnum_sub = $people_sub->num_rows;
if ($rnum_email == 0) {	
	$subscription = mysqli_query($mysqli, "INSERT INTO `people`(`ID`, `name`, `e-mail`, `message`, `subscription`) VALUES (NULL,'$name','$email','$mess','$sub')") or  die (mysqli_error($mysqli));
   header("Location:index.php");} 
   else if ($rnum_sub == 0) {	
	$subscription = mysqli_prepare($mysqli, "UPDATE `people` SET `subscription`= true WHERE `e-mail` = ?") or  die (mysqli_error($mysqli));
	$subscription-> bind_param("s", $email);
  $subscription-> execute();
	header("Location:index.php");}
else{	echo "Вы уже подписаны на раздачу новочтей!!!";	}}
else{	echo "Пожалуйсто введите ваш e-mail";	die();}?>