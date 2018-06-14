<?php

require 'connectdb.php';

$sql = "SELECT * FROM labels";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		


		$label = $row['label'];
		$img =$row['img'];
		echo '<section>
			'.$img.'
			<a class="label" href="label.php?label='.$label.'">'.$label.'</a>
		</section>';

	}
}

?>
