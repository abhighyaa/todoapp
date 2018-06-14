<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){
$times=$_POST['ind'];
$task=$_POST['taskname'];
echo " hiii $task <br>";
while($task!=""){
	
	$loc=strpos($task,"!@#");
	$taskname = substr($task, 0,$loc);
	echo "$taskname <br>";
	$task=substr($task,$loc+3,strlen($task));
	echo "task: $task <br>";
	
}

}


?>