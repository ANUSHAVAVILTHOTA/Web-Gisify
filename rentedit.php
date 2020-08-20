<?php
include("config.php");
$id=$_REQUEST['id'];
$query = "SELECT * from rent where id='".$id."'"; 
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
$bname =$_REQUEST['book'];
$sname =$_REQUEST['student'];
$sdate =$_REQUEST['sdate'];
$edate =$_REQUEST['edate'];


$update="update rent set sname='".$sname."', bname='".$bname."', sdate='".$sdate."', edate='".$edate."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
header ("location: rent.php"); 
  }


else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p>
<select name="student">
                            <?php
                            $link = mysqli_connect("localhost", "root", "", "Admin");
                            $sql = "SELECT DISTINCT id, name
                            FROM studentdetails";
                            $result = mysqli_query($link, $sql);
                            print "<option value='student' selected>Students Drop Down</option>";
                            While ($row = mysqli_fetch_assoc($result))
                                {
                                print "<option value=" . $row["name"] . ">"
                            . $row["name"] . "</option>";
                                }
                            ?>
                        </select>
</p>

<p>
<select name="book">
                            <?php
                            $link = mysqli_connect("localhost", "root", "", "Admin");
                            $sql = "SELECT DISTINCT id, bname
                            FROM book";
                            $result = mysqli_query($link, $sql);
                            print "<option value='books' selected>Books Drop Down</option>";
                            While ($row = mysqli_fetch_assoc($result))
                                {
                                print "<option value=" . $row["bname"] . ">"
                            . $row["bname"] . "</option>";
                                }
                            ?>
                        </select>
</p>
<p><input type="date" name="sdate" placeholder="Enter Sdate" 
required value="<?php echo $row['sdate'];?>" /></p>
<p><input type="date" name="edate" placeholder="Enter Edate" 
required value="<?php echo $row['edate'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div></center>
</div>
</body>
</html>