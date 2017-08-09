<?php
require "conf/config.php";
session_start();
if(isset($_POST["logout"]))
{
 session_destroy();
 header("location:index.php");
	
}




$query1="select * from category ";
	$query_ru1=mysqli_query($con,$query1);
$cat=array();
$count=0;

	while($row=mysqli_fetch_array($query_ru1,MYSQLI_ASSOC))
	{
		$cat[]=$row["cname"];
		$count++;
			
			
	}	?>
	
	
	
	



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="sweetalert.min.js"></script>
<link rel="stylesheet" href="sweetalert.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background:#2c3e50">
<br>
<br>
<div class="container" style="background:#ecf0f1;padding:50px; border-radius: 15px 50px 30px">
<form action="admin.php" method="post">
  <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#menu1">Add Question</a></li>
    <li><a data-toggle="tab" href="#menu2">Add Category</a></li>
    <li><a data-toggle="tab" href="#menu3">Delete Category</a></li>
	<li style="float:right;"><button type="submit" class="btn btn-danger" name="logout" onclick=" return confirm('Are you sure to logout?')">Logout</button></li>
	  <a href="home.php"><button type="button" class="btn btn-info" style="float:right;margin-right:10px;">Quiz Home</button></a>
  </ul>

  <div class="tab-content">
    
    <div id="menu1" class="tab-pane fade in active">
      
	<br>
	<br>
	
	 <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">

	
	
	<div class="form-group">
      <label for="Question">Question:</label>
      <input type="text" class="form-control" id="Question" placeholder="Enter Question" name="question">
    </div>
	 <label for="Option">Enter Options:</label>
    <div class="form-group">
      <input type="text" class="form-control" id=opt1" placeholder="Enter option 1" name="opt1">
    </div>
   <div class="form-group">
      <input type="text" class="form-control" id=opt2" placeholder="Enter option 2" name="opt2">
    </div>
	<div class="form-group">
      <input type="text" class="form-control" id=opt3" placeholder="Enter option 3" name="opt3">
    </div>
	<div class="form-group">
      <input type="text" class="form-control" id=opt4" placeholder="Enter option 4" name="opt4">
    </div>
	<label for="Option">Enter Answer:</label>
	
	<div class="form-group">
 <input type="text" class="form-control" id="answer" placeholder="answer" name="answer">
    </div>
	<label for="Question">Choose Category:</label>
	<select class="form-control" name="catg">
 <?php  
for($i=0;$i<$count;$i++) {
	$ic=$i+1;
echo "<option value='$cat[$i]'>$cat[$i]</option>";
}
?>
  </select>
  <br>
  <br>
  <button type="submit" class="btn btn-primary" name="addQ">Enter Question</button>
  </div>
  <div class="col-sm-2"></div>
</div>
</div>

<div id="menu2" class="tab-pane fade">
<br>
<br>
<br>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
  <label for="Option">Enter Category:</label>
    <div class="form-group">
      <input type="text" class="form-control" id=catsub" placeholder="Enter new category" name="cadd">
	  <br>
	  <br>
	   <button type="submit" class="btn btn-success" name="caddbt">Add</button>
    </div>
  </div>
  <div class="col-sm-2"></div>
</div>
      
   </div>
      <div id="menu3" class="tab-pane fade">
      
    <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
  <br>
  <br>
   <br>
  <label for="DelCat">Delete Category:</label>
	<select class="form-control" name="catgdel">
 <?php  
for($i=0;$i<$count;$i++) {
	$ic=$i+1;
	echo "<option value='$cat[$i]'>$cat[$i]</option>";
}
?>
  </select>
  <br>
  <br>
  <button type="submit" class="btn btn-danger" name="cdel">Delete</button>
	</div>
<div class="col-sm-2"></div>
</form>


<?php

if(isset($_POST["caddbt"]))
	{
	$cadd=$_POST["cadd"];
	
		$query="select * from category where cname='$cadd'";
$query_run=mysqli_query($con,$query);
if(mysqli_num_rows($query_run)>0)
{
	echo "<script>sweetAlert('Oops...','already that category present!')</script>";
}
	else{$qu="insert into category (cname) values('$cadd')";
mysqli_query($con,$qu) or die ("error");
	echo "<script>sweetAlert('Done!', 'Category added', 'success')</script>";
		
		
		
		
		
		
	}
	}
	if(isset($_POST["cdel"]))
	
	{
	
	
	
	
	$cdel1=$_POST["catgdel"];
	$qu="delete from category where cname='$cdel1'";
mysqli_query($con,$qu) or die ("error");
echo "<script>sweetAlert('Done...','Category Deleted!','error')</script>";

}
	
?>	

<?php

if(isset($_POST["addQ"])){
	
$question=$_POST["question"];
$opt1=$_POST["opt1"];
$opt2=$_POST["opt2"];
$opt3=$_POST["opt3"];
$opt4=$_POST["opt4"];
$answer=$_POST["answer"];
$index=0;
$catg=$_POST["catg"];


switch ("$answer") {
    case "$opt1":$index=0;
        break;
    
	case "$opt2":$index=1;
        break;
   
   case "$opt3":$index=2;
        break;
   
   case "$opt4":$index=3;
        break;
}

$query7="insert into question values('','$question','$opt1','$opt2','$opt3','$opt4','$index','$catg')";
mysqli_query($con,$query7) or die("error bhai!");

echo "<script>sweetAlert('Done!','question added','success')</script>";



}






?>

























	</div>
	</div>
  </div>
</div>
</body>
</html>