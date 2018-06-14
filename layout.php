<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>To Do List App</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>	

</head>
<body>
<form id="createTask"  method="POST">
	<fieldset>
		<legend>Create Task</legend>
			<label>What needs to be done?</label><br>
			<input type="text" name="taskname" id="taskname0" required><br><br>
			<label>Description</label><br>
			<textarea name="description" id="description0"></textarea><br><br>
			<label>Any due dates?</label><br>
			<input type="date" name="date" id="duedate"><br><br>
			<label>Label</label><br>
			<input list="label1" type="label" id="label" name="label">
			<datalist id="label1">
				<option selected>Default</option>
				<?php include 'options.php'?>
			</datalist><br><br><br>
			<label>Status</label>
			<select name="status" id="status">
			
				<option selected>Not Completed</option>
				<option>In progress</option>
				<option>Completed</option>
			</select>
			<br><br>
			<label>Priority</label>
			<select id="priority" name="priority"> 
				<option>Urgent</option>
				<option selected>Normal</option>
			</select>
			<br><br><br>
			<label>Pin to profile</label>
			<input type="radio" name="pin" id="pin" value="Yes">Yes
			<input type="radio" name="pin" id="pin"  value="No">No
			<br><br>
			<div id="more"></div>
			<a id="add" href="#">Add related tasks</a>
			<br><br><br>
			<a href="#" class="cancel">Cancel</a>
			<input type="submit" name="Save" id="save">
	</fieldset>
</form>	
<div class="container">

	<div class="nav">
		
		<section>
			<img id="user" src="user-f.png">
			<label id="name">Abhighyaa Jain</label>
		</section>		

		<section>
			<img src="https://png.icons8.com/ios/50/000000/sun.png">
			<a href="myday.php">My day</a>
		</section>

		<section>
			<img src="https://png.icons8.com/cotton/50/000000/checklist.png">
			<a href="index.php">To do</a>
		</section>
		<?php
			 include 'nav.php';
		?>
	
		<section>
			<img src="https://png.icons8.com/dusk/40/000000/add.png">
			<a id="newlabel">New label</a>
			<div id="new">
				<input type="text" id="input" name="new" placeholder="Create new label">
				<button id="done">Done</button>
			</div>
		</section>
	</div>

	<div class="main">

		<div class="main1">

			<input type="text" id="create" name="task" placeholder="create new task here">

			<aside>
				<a href="#"><img src="https://png.icons8.com/dusk/50/000000/picture.png"></a>
				<a href="#"><img src="https://png.icons8.com/material/50/000000/checklist.png"></a>
			
			</aside>

			<input type="text" id="search" name="search" placeholder="Search any Task">
		</div>

		<div class="main2">