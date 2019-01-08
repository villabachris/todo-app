<?php 
require_once('../connection.php');

$task= $_POST['name'];

$sql= "INSERT INTO task(name) VALUES('$task')";
$result= mysqli_query($conn,$sql);

if ($result === TRUE) {
	echo "Success added Task";
	header('Location:../index.php');
}else{
	echo "error" . $sql . "br" . mysqli_error($conn);
}
mysqli_close($conn);
 ?>