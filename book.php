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
                       <form method="post" action="bookstore.php" enctype='multipart/form-data'>
                            <center><h3>Book Form</h3></center>
                            <br><label>Book Name</label>
                            <input type="name" name="name"/></br>
                            <label>Author</label>
                            <input type="text" name="bauthor"/></br>
                            <label>Publication Year</label>
                            <input type="number" name="year"/></br>
                            <br>
                            <input type='submit' value='Save' name='book_upload'><br>
                        </form><br>
                            
                      </div>

                    <div class="col-md-3">
                    </div>
              </div>
          </div>
<div class="container">
<div class="row">
<div class="form">
<h2>Book Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.Id</strong></th>
<th><strong>Book Name</strong></th>
<th><strong>Student Name</strong></th>
<th><strong>Publication Year</strong></th>
<th><strong>Reg Date</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
include("config.php");
// $count=1;
$sel_query="Select * from book;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $row["id"]; ?></td>
<td align="center"><?php echo $row["bname"]; ?></td>
<td align="center"><?php echo $row["author"]; ?></td>
<td align="center"><?php echo $row["pyear"]; ?></td>
<td align="center"><?php echo $row["regdate"]; ?></td>
<td align="center">
<a href="bookedit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="bookdelete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php  } ?>
</tbody>
</table>
</div>
</div>
</div>

</body>
</html>