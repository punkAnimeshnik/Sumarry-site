<?php
include 'SQL.php';
$email = $_POST['email'];
$name = $_POST['name'];
$mess =$_POST['ms'];
$ID = $_POST['ID'];
$blogs = mysqli_query($mysqli, "SELECT * FROM `blog` WHERE `ID` = '$ID' ORDER BY data DESC Limit 1");
$blog = mysqli_fetch_assoc($blogs);
$name_blog = $blog[name];
$comment_blog = $blog[comments] + 1;
$look_blog = $blog[looks] + 1;
if (!empty($email)&&!empty($name)&&!empty($mess)) {
$people_email = mysqli_prepare($mysqli, "SELECT `e-mail` FROM `people` WHERE `e-mail` = ? Limit 1");
$people_email-> bind_param("s", $email);
$people_email-> execute();
$people_email-> bind_result($email);
$people_email-> store_result();
$rnum = $people_email->num_rows;
if ($rnum == 0) {	
	  $message = mysqli_query($mysqli, "INSERT INTO `people`(`ID`, `name`, `e-mail`) VALUES (NULL,'$name','$email')") or  die (mysqli_error($mysqli));
    $people = mysqli_query($mysqli, "SELECT `ID` FROM `people` WHERE `e-mail` = '$email' Limit 1");
    $id_people = mysqli_fetch_assoc($people);
    $comment = mysqli_query($mysqli, "INSERT INTO `blog_comment`(`ID_blog`, `name_blog`, `ID_people`, `name_people`, `comment`) VALUES ($ID,'$name_blog','$id_people[ID]','$name','$mess')") or  die (mysqli_error($mysqli));
    $CommLook = mysqli_query($mysqli, "UPDATE `blog` SET `looks`='$look_blog',`comments`='$comment_blog' WHERE `ID` = '$ID'") or  die (mysqli_error($mysqli));}
else {$people = mysqli_query($mysqli, "SELECT `ID` FROM `people` WHERE `e-mail` = '$email' Limit 1");
    $id_people = mysqli_fetch_assoc($people);
    $comment = mysqli_query($mysqli, "INSERT INTO `blog_comment`(`ID_blog`, `name_blog`, `ID_people`, `name_people`, `comment`) VALUES ($ID,'$name_blog','$id_people[ID]','$name','$mess')") or  die (mysqli_error($mysqli));
    $CommLook = mysqli_query($mysqli, "UPDATE `blog` SET `looks`='$look_blog',`comments`='$comment_blog' WHERE `ID` = '$ID'") or  die (mysqli_error($mysqli));}
	 header("Location:index.php"); }
else{echo "Пожалуйсто заполните одно из полей";	die();}?>