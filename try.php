<?php
session_start();
$_SESSION['img'] = "user-f.png";

?>
<!DOCTYPE html>
<html>
<head>
	<title>try</title>
</head>
<body>
<img src="<?php echo $_SESSION['img']?>">
</body>
</html>