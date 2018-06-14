<?php
session_start();
require 'connectdb.php';

$task=$_POST["taskname"];
$des=$_POST["description"];
$date1=$_POST["date"];
$label=$_POST["label"];
$status = $_POST['status'];
$priority=$_POST['priority'];
$pin = $_POST['pin'];

if($_SERVER["REQUEST_METHOD"]=="POST")
{
$taskname = $_SESSION['taskname'];
$description = $_SESSION['desc'];
$due = $_SESSION['due'];	


if($status!="Completed"){


$sql = "UPDATE tasks SET task='$task', description='$des',duedate='$date1',done='$status',priority='$priority',pin='$pin' WHERE task='$taskname' ";

/*else if($task==""&&$des!=""){
$sql = "UPDATE tasks SET description='$des',duedate='$due',done='$status' WHERE task='$taskname' ";
}
else if($task!=""&&$des==""){
$sql = "UPDATE tasks SET task='$task',duedate='$due',done='$status' WHERE task='$taskname' ";
}
else
	$sql = "UPDATE tasks SET duedate='$due',done='$status' WHERE task='$taskname' ";
*/


if ($conn->query($sql) === TRUE) {

    // header('location:index.php');
   
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

else{

$sql="INSERT INTO completed (task,description,label) VALUES ('$taskname','$description','$label')";

$sql1 = "DELETE FROM tasks WHERE  task='$taskname' ";
$conn->query($sql);
$conn->query($sql1);
header('location:index.php');

}
}

$conn->close();

?>