<?php
include("config.php");
$id=$_REQUEST['id'];
$query = "SELECT * from book where id='".$id."'"; 
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
<body  style="background-color:powderblue;border-radius:10px;">
<div class="form">

<center><h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
// $trn_date = date("Y-m-d H:i:s");
$bname =$_REQUEST['name'];
$author =$_REQUEST['bauthor'];
$pyear =$_REQUEST['year'];
$current_date = date("Y-m-d H:i:s");

$update="update book set bname='".$bname."', author='".$author."', pyear='".$pyear."', regdate='".$current_date."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
header ("location: book.php"); 
  }


else {
?>
<div class="container">
  <div class="row"  >
      <div class="col-md-3">
      </div>
      <div class="col-md-6" >
        
        <form name="form" method="post" action=""> 
        <input type="hidden" name="new" value="1" />
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="name" name="name" placeholder="Enter Name" 
        required value="<?php echo $row['bname'];?>" /></p>

        <p><input type="text" name="bauthor" placeholder="Enter Name" 
        required value="<?php echo $row['author'];?>" /></p>

        <p><input type="number" name="year" placeholder="Enter Publication Year" 
        required value="<?php echo $row['pyear'];?>" /></p>

        <p><input name="submit" type="submit" value="Update" /></p>
        </form>
        <?php } ?>

      </div>
      <div class="col-md-3">
      </div>
  </div>
</div></center>
</div>


</body>
</html>