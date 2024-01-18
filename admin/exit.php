<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Giriş Yap</title>
</head>
<body>
	<?php 
		session_start();
		unset($_SESSION['adSoyad']);
		header("Location:../index.php?loggin");
	?>
</body>
</html>