<?php
include("config.php");

if(isset($_POST['but_upload'])){
  $sname=$_POST['sname'];
  $class=$_POST['class'];
  $name = $_FILES['file']['name'];
  $vname = $_FILES['file1']['name'];
  $target_dir = getcwd().DIRECTORY_SEPARATOR.'upload/';
  $vtarget_dir = getcwd().DIRECTORY_SEPARATOR.'video/';
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $vtarget_file = $vtarget_dir . basename($_FILES["file1"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $videoFileType = strtolower(pathinfo($vtarget_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");
  $vextensions_arr = array("mp4","ogg","mkv","webm");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ) {
	if( in_array($videoFileType,$vextensions_arr) ){
     // Insert record
     $query = "insert into studentdetails(name,class,photo,video) values('".$sname."','".$class."','".$name."','".$vname."')";
	 mysqli_query($con,$query);
	
  
     // Upload file
	 move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
	 move_uploaded_file($_FILES['file1']['tmp_name'],$vtarget_dir.$vname);
	 header ("location: student.php");  
	}
  }
 
}
?>