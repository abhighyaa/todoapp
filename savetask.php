<?php

require 'connectdb.php';

$task=$_POST["taskname"];
$des=$_POST["description"];
$date=$_POST["duedate"];
$label=$_POST["label"];
$status=$_POST["status"];
$priority=$_POST["priority"];


if($_SERVER["REQUEST_METHOD"]=="POST")
{

$sql = "INSERT INTO tasks (task,description,duedate,label,done,priority) VALUES ('$task','$des','$date','$label','$status','$priority')";

if ($conn->query($sql) === TRUE) {

    //header('location: index.php');
   
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>