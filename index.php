<?php 
	require_once('./connection.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TO DO APP LIST</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	

		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
</head>
<body>

		<h1 class="text-center">To Do App List</h1>
	<form>
		<div class="form-group">
			<div class="row">
				<div class="col-md-8 mx-auto">
					<input type="text" name="task" class="form-control" placeholder="..Type task" id="new_task">
					<button class="btn btn-primary btn-block" id="addTaskBtn">Add Task</button>
				</div>	
			</div>	
		</div>
	</form>

	<script>
		$("#addTaskBtn").click( () => {
			const newTask = $('#new_task').val();

			$.ajax({
				method : 'POST',
				url : 'controllers/add_task.php',
				data: {name: newTask},
			}).done( data => {
				console.log('added task');
			});
		});
	</script>
	
	<hr class="col-md-8 mx-auto">

	<?php echo conn_test();?>
	<div class="row">
		<div class="col-md-8 mx-auto">
			<ul id="task_list">
					
				<?php 
					$task = 'name';

					$sql= "SELECT * FROM task";
					$result= mysqli_query($conn, $sql);

					while($row= mysqli_fetch_assoc($result)){?>
				<li data-id="<?php echo $row['id'];?>">
					<div class="row my-2 border">
						<div class="col-md-5 mx-auto">
							<?php echo "<strong>".$row['name']."</strong>"." is task number".$row['id'];?>
						</div>
							<button class="btn btn-danger col-md-2" id='taskDelete'>Delete</button>
					</div>
									

				</li>
				<?php }?>

			</ul>
		</div>
	</div>

	<script>
		//delete task
		$('#taskDelete').click( () =>{
			const task_id = $(this).parent().attr('data-id');
			//console.log(task_id)
			$.ajax({
				method: "POST",
				url: 'controllers/remove_task.php',
				data: {task_id: task_id}
			}).done( data => {
				$(this).parent().fadeOut();
			}); 
		});
	</script>


<script type="text/javascript" href="assets/js/script.js"></script>
</body>
</html>