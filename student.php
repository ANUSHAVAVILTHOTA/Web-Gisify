<!DOCTYPE html>
    <head>
      <title>SignUp</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color: #d780f5;">  
	       <div class="container">
             <div class="row"><br>
               <div class="col-md-4">
                   
                    <button type="button" class="btn btn-info"> <a href="student.php">Student</a></button>
               </div>
               <div class="col-md-4">
               <button type="button" class="btn btn-info"> <a href="book.php">Book</a></button>
               </div>
               <div class="col-md-4">
               <button type="button" class="btn btn-info"> <a href="rent.php">Rent</a></button>
               </div>
             </div><br>
              <div class="row">
	                 <div class="col-md-3">
		               </div>

		               <div class="col-md-6" style="background-color:powderblue;border-radius:10px;">
                       <form method="post" action="studentstore.php" enctype='multipart/form-data'>
                            <center><h3>Student Form</h3></center>
                            <br><label>Student Name</label>
                            <input type="namet" name="sname"/><br>
                            <label>Class Name</label>
                            <input type="text" name="class"/><br>
                            <label>Image</label>
                            <input type='file' name='file' /><br>
                            <label>Video</label>
                            <input type='file' name='file1' /><br>
                            <input type='submit' value='Save' name='but_upload'>
                            </br>
                        </form></br>
                            
                      </div>

                    <div class="col-md-3">
                    </div>
              </div>
          </div>
        </form>

<div class="container">
  <div class="row">
  <div class="form">
<h2>Student Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.Id</strong></th>
<th><strong>Name</strong></th>
<th><strong>Class</strong></th>
<th><strong>Photo</strong></th>
<th><strong>Video</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
include("config.php");
$count=1;
$sel_query="Select * from studentdetails;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["class"]; ?></td>
<td align="center"><?php echo $row["photo"]; ?></td>
<td align="center"><?php echo $row["video"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
   </div>
</div>

</body>
</html>