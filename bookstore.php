<?php
include("config.php");

if(isset($_POST['book_upload'])){
  $bname=$_POST['name'];
  $author=$_POST['bauthor'];
  $pyear=$_POST['year'];
  $current_date = date("Y-m-d H:i:s");
//   $regdate=$_POST['author'];
     // Insert record
 $query = "insert into book(bname,author,pyear,regdate) values('".$bname."','".$author."','".$pyear."','".$current_date."')";
 mysqli_query($con,$query);
 header ("location: book.php");  
  
 
 
}
?>