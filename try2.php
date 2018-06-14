
<?php
$status='In progress';
?>
<!DOCTYPE html>
<html>
<head>
	<title>tryy</title>
</head>
<body>

	<select>
		<option <?php if($status == 'Not Completed') echo "selected" ; ?>>Not Completed</option>
		<option <?php if($status == 'In progress') echo "selected";?>>In progress</option>
		<option <?php if($status == 'Completed') echo "selected" ;?>?Completed</option>
	</select>

</body>
</html>