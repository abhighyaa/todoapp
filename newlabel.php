<?php

require 'connectdb.php';

$nlabelname = $_REQUEST['labelname'];

$check = "SELECT * FROM labels where label='$nlabelname' ";
$result = $conn->query($check);

if ($result->num_rows > 0) {
	$error= "Label already exists";
	/*header('location:?');*/
}

else{
	$sql = "INSERT INTO labels (label) VALUES ('$nlabelname')";
	if ($conn->query($sql) === TRUE) {
		header('location:index.php');
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>