<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="POST">
		<input type="hidden" name="hidden" value="afds">
		<input type="text" name="text">
		<input type="submit">
	</form>
</body>
</html>



<?php
 $hidden = $_POST['hidden'];
$text = $_POST['text'];
echo $hidden;
echo $text;
?>