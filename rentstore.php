<?php
include("config.php");

if(isset($_POST['rent_upload'])){
  $sdate=$_POST['sdate'];
  $edate=$_POST['edate'];
  $bname=$_POST['book'];
  $sname=$_POST['student'];
  $current_date = date("Y-m-d H:i:s");

 $query = "insert into rent(sname,bname,sdate,edate) values('".$sname."','".$bname."','".$sdate."','".$edate."')";
 mysqli_query($con,$query);
 header ("location: rent.php");  
  
 
 
}
?>