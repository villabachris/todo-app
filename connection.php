<?php 
$host= "localhost";
$username= "root";
$password= "";
$dbname= "todo_app_db";
$conn= mysqli_connect($host, $username, $password, $dbname);

$status ="";
function conn_test($status){
if (!$conn){
	die('Connection failed: '.mysqli_error($conn));
}
	return $status="Connected Successfully"."<br>";	
}
 ?>
