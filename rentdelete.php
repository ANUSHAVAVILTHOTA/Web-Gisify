<?php
include('config.php');

$id=$_REQUEST['id'];
$query = "DELETE FROM rent WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: rent.php"); 
?>