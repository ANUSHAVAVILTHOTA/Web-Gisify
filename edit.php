<?php
include("config.php");
$id=$_REQUEST['id'];
$query = "SELECT * from studentdetails where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<!-- <link rel="stylesheet" href="css/style.css" /> -->
</head>
<body>
<div class="form">

<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
// $trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$class =$_REQUEST['class'];
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
    //  $query = "insert into studentdetails(name,class,photo,video) values('".$sname."','".$class."','".$name."','".$vname."')";
    //  mysqli_query($con,$query);
     $update="update studentdetails set name='".$name."', class='".$class."', photo='".$name."', video='".$vname."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
	
  
     // Upload file
	 move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
	 move_uploaded_file($_FILES['file1']['tmp_name'],$vtarget_dir.$vname);
	 header ("location: student.php");  
	}
  }

}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Name" 
required value="<?php echo $row['name'];?>" /></p>

<p><input type="text" name="class" placeholder="Enter Name" 
required value="<?php echo $row['class'];?>" /></p>
<p><input type='file' name='file' placeholder='image' required value="<?php echo $row['photo'];?>"/></p>
<p><input type='file' name='file1' placeholder='video' required value="<?php echo $row['video'];?>"/></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>