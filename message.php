<?php
include 'SQL.php';
$email = $_POST['email'];
$name = $_POST['name'];
$mess =$_POST['message'];
$sub = "";
if (!empty($email)&&!empty($name)&&!empty($mess)) {
$people_email = mysqli_prepare($mysqli, "SELECT `e-mail` FROM `people` WHERE `e-mail` = ? Limit 1");
$people_email-> bind_param("s", $email);
$people_email-> execute();
$people_email-> bind_result($email);
$people_email-> store_result();
$rnum = $people_email->num_rows;
if ($rnum == 0) {
	$mess = date("d m Y", time())."\r\n".$mess;
	$message = mysqli_query($mysqli, "INSERT INTO `people`(`ID`, `name`, `e-mail`, `message`) VALUES (NULL,'$name','$email','$mess')") or  die (mysqli_error($mysqli));}
   else { $people_message = mysqli_query($mysqli, "SELECT `message` FROM `people` WHERE `e-mail` = '$email' Limit 1");
  $msg = mysqli_fetch_assoc($people_message);
	$mess = date("d m Y", time())."\r\n".$mess."\r\n"."\r\n". $msg[message] ;	
	$message = mysqli_prepare($mysqli, "UPDATE `people` SET `name`='$name',`message`='$mess' WHERE `e-mail` = ?") or  die (mysqli_error($mysqli));
	$message-> bind_param("s", $email);
  $message-> execute();	} 
	header("Location:index.php"); }
else{	echo "Пожалуйсто заполните одно из полей"; die();}?>