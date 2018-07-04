<?php
	session_start();
	// include 'layout.php';

	$text = $_REQUEST['text'];


	// $array = explode(' ', $text);
	// print_r($array);
	//echo "<br>Text recieved is : $text<br><br>";
	$count = substr_count($text, ":");
	// echo "$count";
	$count = ($count-4);
	// for($i=0;$i<$count;$i++){
	// 	$pos = strpos($text, ":"); 
	// 	// echo "<br>current pos : $pos";
	// 	$temp= substr($text, $pos+1);
	// 	// echo "<br>temp $temp";
	// 	$nextpos = strpos($temp, ":");
	// 	// echo "<br>next pos : $nextpos";
	// 	$temp = substr($temp, 0,$nextpos);
	// 	for($q=0;$q<3;$q++){
	// 		$find=strrpos($temp, " ");
	// 		$temp=substr($temp,0,$find);
	// 		// echo "<br> $q occurence : $temp";
	// 		if($q==2){
	// 			if ($i%2==0 ) {
	// 				$j = $i/2 ;
	// 				 echo "<br> task $j : $temp";

	// 			}
	// 			else{
	// 				$j = $i/2 - 0.5;
	// 				 echo "<br> description $j : $temp";
	// 			}
	// 		}
	// 	}
	// 	$text=substr($text, $pos+1);
	// 	// echo " <br> check is $check";
	// 	// $nextposition = strpos($check, ":");
	// 	// echo "nextposition $nextposition";
	// 	// $text = substr($text, $nextposition+1); 
	// 	// echo "<br>check $text<br>";
	// 	// echo "<br>next pos : $nextpos";
	// 	// if($i%2==0){
	// 	// 	$task[$i]= substr($text, $pos+1,$nextpos);
	// 	// 	echo "<br> task $i : $task[$i]";
	// 	// 	$text=substr($text, $pos+1);
	// 	// }
	// 	// else{
	// 	// 	$description[$i]= substr($text, $pos+1,$nextpos);
	// 	// 	echo "<br> description $i : $description[$i]";
	// 	// 	$text=substr($text, $pos+1);
	// 	// }
	// }
	


	// foreach ($array as $key=>$a) {
	 	
		
	// 	if($a=="Taskname"){
	// 		$nameKeyB = $key+2;
			
	// 	}
	// 	if($a=="Description"){
	// 		$nameKeyE = $key-1;
	// 		$descKeyB = $key+2;
			
	// 	}

	// 	if($a=="Due"){
	// 		$descKeyE = $key-1;
	// 		$dueKeyB = $key+3;
	// 	}

	// 	if($a=="Label"){
	// 		$labelKeyB = $key+2;
	// 	}

	// 	if($a=="Status"){
	// 		$labelKeyE=$key-1;
	// 		$statusKeyB=$key+2;
	// 	}

	// 	if($a=="Priority"){
	// 		$statusKeyE = $key-1;
	// 		$priorityKeyB=$key+2;
	// 	}

	// }

	// $taskname ="";
	// for($i=$nameKeyB;$i<=$nameKeyE;$i++)
	// 	$taskname .= $array[$i]." ";

	// $desc= "";
	// for($i=$descKeyB;$i<=$descKeyE;$i++)
	// 	$desc .= $array[$i]." ";

	// $due=$array[$dueKeyB];

	// $label="";
// for ($i=$labelKeyB; $i <=$labelKeyE ; $i++) { 
// 	$label .=$array[$i]." ";
// }

// $status="";
// for ($i=$statusKeyB; $i <=$statusKeyE; $i++) { 
// 	$status .=$array[$i]." ";
// }
// //echo "$status";
// $priority = $array[$priorityKeyB];
// //echo "$priority";

// $_SESSION['taskname']=$taskname;
// $_SESSION['desc']=$desc ;
// $_SESSION['due']=$due;
// $_SESSION['status']=$status;
// $_SESSION['priority']=$priority;
?>
<form id="savechanges" action="savechanges.php" method="POST">
	<fieldset>
		<legend>Edit Task</legend>

		<?php

		for($i=0;$i<$count;$i++){
		$pos = strpos($text, ":"); 
		// echo "<br>current pos : $pos";
		$temp= substr($text, $pos+1);
		// echo "<br>temp $temp";
		$nextpos = strpos($temp, ":");
		// echo "<br>next pos : $nextpos";
		$temp = substr($temp, 0,$nextpos);
		for($q=0;$q<3;$q++){
			$find=strrpos($temp, " ");
			$temp=substr($temp,0,$find);
			// echo "<br> $q occurence : $temp";
			if($q==2){
				if ($i%2==0 ) {
					$j = $i/2 ;
					 echo '<label>What needs to be done?</label><br>
			<input type="text" disabled id="taskname"name="taskname" value="'. $temp.'"><br><br>';

				}
				else{
					$j = $i/2 - 0.5;
					echo '<label>Description</label><br>
			<textarea name="description" id="description">'. $temp.'</textarea><br><br>';
				}
			}
		}
		$text=substr($text, $pos+1);
	}?>
	<?php
// echo "$text";
// $dueB = strpos($text, ":");
// $due = substr($text, $dueB);
// // $due= substr($text, $pos+2,$pos+2);
// 	echo "<br>due is $due<br>";

	$array = explode(' ', $text);
//print_r($array);
	foreach ($array as $key=>$a) {

		if($a=="Due" ){
			$dueKeyB = $key+3;
		}
		if($a=="Label"){
			$labelKeyB = $key+2;
		}

		if($a=="Status"){
			$labelKeyE=$key-1;
			$statusKeyB=$key+2;
		}

		if($a=="Priority"){
			$statusKeyE = $key-1;
			$priorityKeyB=$key+2;
		}
	}

		$due=$array[$dueKeyB];

		$label="";
		for ($i=$labelKeyB; $i <=$labelKeyE ; $i++) { 
			$label .=$array[$i]." ";
		}

		$status="";
		for ($i=$statusKeyB; $i <=$statusKeyE; $i++) { 
			$status .=$array[$i]." ";
		}
	//echo "$status";
		$priority = $array[$priorityKeyB];
	//echo "$priority";

	

		?>
			<!-- <label>What needs to be done?</label><br>
			<input type="text" id="taskname"name="taskname" value="<?php echo $taskname;?>"><br><br>
			<label>Description</label><br>
			<textarea name="description" id="description"><?php echo $desc;?></textarea><br><br> -->
			<label>Any due dates?</label><br>
			<input type="date" name="date" id="date1" value="<?php echo $due;?>"><br><br>
			<label>Label</label><br>
			<input list="label" type="label" id="label" name="label" value="<?php echo $label;?>">
			<datalist id="label">
				<?php include 'options.php'?>
			</datalist><br><br><br>
			<label>Status</label>
			<select type="status" name="status" id="status">
			
				<option <?php if($status == 'Not Completed') echo "selected" ; ?>>Not Completed</option>
				<option <?php if($status == 'In progress') echo "selected" ;?>>In progress</option>
				<option <?php if($status == 'Completed') echo "selected" ;?>>Completed</option>
			</select>
			<br><br><br>
			<label>Priority</label>
			<select id="priority" name="priority">
				<option  <?php if($priority == 'Normal') echo "selected" ; ?>>Normal</option>
				<option  <?php if($priority == 'Urgent') echo "selected" ; ?>>Urgent</option>
			</select>
			<br><br><br>
			<label>Pin to profile</label>
			<input type="radio" name="pin" value="Yes">Yes
			<input type="radio" name="pin" value="No">No				
			<!--<a href="#" id="cancel">Cancel</a>-->
			<input type="button" class="savechanges" name="Save changes" value="Save changes" >
	</fieldset>
</form>	


<!-- <?php
//include 'layout2.php';
?> -->