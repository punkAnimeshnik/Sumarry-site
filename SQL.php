<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurantbd";
$mysqli = new mysqli($servername, $username, $password, $dbname); 
 if ($mysqli == false) {echo "database did not connect";}?>