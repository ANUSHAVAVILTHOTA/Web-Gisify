<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Logout</title>
</head>

<body>
</body>
</html>


<?php
	session_start();
	session_destroy();
		if($_SESSION['username']==0)
	{
		echo"<script>alert('logout successfull');</script>";
		echo"<script>window.open('index.php','_parent');</script>";	

	}
?>