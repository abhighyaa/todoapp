<?php

require 'connectdb.php';

$find = $_GET['str'];

$sql = "SELECT * FROM tasks";

$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {

		$len = strlen($find);

		$task =$row['task'];
		$des = $row['description'];
		$date = $row['duedate'];
		$label = $row['label'];
		$status = $row['done'];
		$priority =$row['priority'];
		if (stristr($find, substr($task, 0, $len))){
			echo '<div class="tasks "><fieldset><legend>Task Details';
				if($pin=="Yes")
					echo '<img id="pin" src="https://png.icons8.com/dusk/50/000000/attach.png"><br>';
		echo '</legend>';
		$i=0;
		while($task!=""){
				$i++;
				$loct=strpos($task,"!@#");
				$locd=strpos($description,"!@#");
				$taskname = substr($task, 0,$loct);
				echo "<b>Task $i : $taskname </b><br>";
				$task=substr($task,$loct+3,strlen($task));
				$desname = substr($description, 0,$locd);
				echo "Description $i : $desname <br>";
				$description=substr($description,$locd+3,strlen($description));
				
		}

		
		//echo '<b> Taskname : '.$task.' </b><br><br>Description : '.$des.'<br><br>';
		echo ' Due date : '.$date.' <br><br> Label : '.$label.'<br><br> Status : '.$status.'<br><br> Priority : '.$priority.'<br><br>
<button class="edit" value="Edit"> Edit</button>
				<button class="cancel" value="Cancel"> Cancel</button></fieldset></div>';
				// 	echo '<div class="tasks "><fieldset><legend>Task Details';
				// if($pin=="Yes")
// 					echo '<img id="pin" src="https://png.icons8.com/dusk/50/000000/attach.png"><br>';
// 				echo '</legend><b>Taskname : '.$task.' </b><br><br>Description : '.$des.'<br><br> Due date : '.$date.' <br><br> Label : '.$label.'<br><br> Status : '.$status.'<br><br> Priority : '.$priority.'<br><br>
// <button class="edit" value="Edit"> Edit</button>
// 				<button class="cancel" value="Cancel"> Cancel</button></fieldset></div>';				$i=1;
		}
	}

}
else{
	    echo "Error: " . $sql . "<br>" . $conn->error;

}

if($i==0)
{
	echo "No matching searches!!";
}

?>