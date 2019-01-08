<?php 
/*$host= "localhost";*/
$host= "db4free.net";
$username= "chris_db";
$password= "kyawti123";
$dbname= "todo_app_db123";
$conn= mysqli_connect($host, $username, $password, $dbname);



if (!$conn){
	die('Connection failed: '.mysqli_error($conn));
}
	echo $status="Connected Successfully"."<br>";	

 ?>
