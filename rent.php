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
            <div class="row" ><br>
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
              <form method="post" action="rentstore.php" enctype='multipart/form-data'>
	                   <div class="col-md-3">
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
		               </div>
                       <div class="col-md-3">
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
		               </div>
                       <div class="col-md-3">
                            <label for="sdate">Start Date:</label>
                            <input type="date" id="sdate" name="sdate"> 
		               </div>
                        <div class="col-md-3">
                            <label for="edate">End Date:</label>
                            <input type="date" id="edate" name="edate"> 
                        </div>
                    
              </div>
              <div class="row">
                  <br><br>
                <center><input type='submit' value='Save' name='rent_upload'></center>

              </div>
              </form>
          </div>
<div class="container">
<div class="row">
<div class="form">
<h2>Rent Details</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Id</strong></th>
<th><strong>Student Name</strong></th>
<th><strong>Book Name</strong></th>
<th><strong>Starting Date</strong></th>
<th><strong>Ending Date</strong></th>
</tr>
</thead>
<tbody>
<?php
include("config.php");
// $count=1;
$sel_query="Select * from rent;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $row["id"]; ?></td>
<td align="center"><?php echo $row["sname"]; ?></td>
<td align="center"><?php echo $row["bname"]; ?></td>
<td align="center"><?php echo $row["sdate"]; ?></td>
<td align="center"><?php echo $row["edate"]; ?></td>
<td align="center">
<a href="rentedit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="rentdelete.php?id=<?php echo $row["id"]; ?>">Delete</a>
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