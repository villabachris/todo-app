<?php 
require_once('../connection.php');

$id= $_POST["task_id"];


$sql= "DELETE FROM task WHERE id  = $id"; 
$result= mysqli_query($conn, $sql);



if($result === TRUE){
	echo "Deleted Successfully";
}
	echo "error" .$sql. "<br>". msqli_error($conn);
}

msqli_close();	
 ?>
