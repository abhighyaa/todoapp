<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<form id="save"  method="POST">
	<fieldset>
		<legend>Create Task</legend>
			<label>What needs to be done?</label><br>
			<input type="text" name="taskname0" id="taskname0" required><br><br>
			<label>Description</label><br>
			<textarea name="description" id="description"></textarea><br><br>
			<label>Any due dates?</label><br>
			<input type="date" name="date" id="date"><br><br>
			<label>Label</label><br>
			<input list="label" type="label" id="label" name="label">
			<datalist id="label">
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
			<input type="radio" name="pin" value="No" id="pin">No
			<br>
			<div id="more"></div>
			<a id="add" href="#">Add related tasks</a>
			<br>
			<a href="#" class="cancel">Cancel</a>
			<input type="submit" name="Save">
	</fieldset>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
	var index=0;

	$("#add").click(function(){
	index++;
    $("#more").append('<label>What needs to be done?</label><br>\
      <input type="text" name="taskname'+index+'" id="taskname'+index+'" required><br><br>\
      <label>Description</label><br>\
      <textarea name="description'+index+'" id="description'+index+'"></textarea><br><br>');
  });

	$("#save").submit(function(){

			taskname="";
			description="";
			
			for(i=0;i<=index;i++){
	        	taskname += $("#taskname"+i).val()+"!@#";
	        	description += $("#description"+i).val()+"!@#";
	    	}
	    	//alert(taskname);

		$.post("trysubmit.php",
	    {
	    	ind:index,
	    	taskname:taskname,
	        description:description,
	        date:$("#date1").val(),
	        label:$("#label").val(),
	        status :$("#status").val(),
	        priority:$("priority").val(),
	        pin :$("#pin").val()
	    },
	    function(data, status){
	      document.write(data);
    });
	});

</script>	
</body>
</html>