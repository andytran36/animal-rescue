<?php

$user = 'root';
$pass = '';
$db = 'rescue';
$servername = 'localhost';

$conn = mysqli_connect($servername, $user, $pass, $db);
if(!$conn) {
	die("Cannot connect becaause: " . mysqli_connect_error());
}


//$db = new mysqli('localhost', $user, $pass, $db) or die("Cannot connect");

//echo "string";

