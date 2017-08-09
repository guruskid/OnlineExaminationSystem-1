






<?php

session_start();
require "conf/config.php";
?>










<html>
  <title>Online Examination System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="sweetalert.min.js"></script>
<link rel="stylesheet" href="sweetalert.css" />
</head>
<body>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Examination System By Vishal Varma</a>
    </div>
    
</nav> 



<div class="container" style="margin-bottom:40px">
<br>
<br>
 <div class="col-sm-12">
<div class="well well-lg" style="#95a5a6">
<center><img src="is.jpg"></img>
<h3>Online Examination System</h3></center>
</div>
</div>
</div>


<div class="container" style="background-color:#ecf0f1;padding:25px;border-radius:10px;">
<div class="row">
  <div class="col-md-6">
    
  <div class="panel panel-success">
  <div class="panel-heading"><h4 style="text-align:center">Login</h4></div>
  <div class="panel-body">
  <form method="post" action="index.php">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="text" class="form-control" name="e1" placeholder="Email">
  </div>
  <br><br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="pw1" placeholder="Password">
  </div>
    <br>
    <button type="submit" class="btn btn-success" name="bt1">Submit</button>
  </form>
  
 </div>
  </div>
  </div>
   
   
   
   <div class="col-md-1"></div>
  
  
  
  
  
  
  <div class="col-md-5">
    <div class="panel panel-info">
  <div class="panel-heading"><h4 style="text-align:center">Sign Up</h4></div>
  <div class="panel-body">
  <form method="post" entype="multipart/form-data" action="index.php">
    <div class="form-group">
	      <label for="firstname">First Name:</label>
      <input type="text" class="form-control" name="fn" id="fname" placeholder="Enter First Name" required>
    </div>
	    <div class="form-group">   <label for="lastname">Last Name:</label>
      <input type="text" class="form-control" name="ln" id="lname" placeholder="Enter Last Name" required>
    </div>
    <div class="form-group">  <label for="email">Email:</label>
      <input type="email" class="form-control" name="emi" id="email" placeholder="Enter email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="pw2" id="pwd" placeholder="Enter password" required>
    </div>
	<button type="submit" class="btn btn-primary" name="bt2">Submit</button>
  </form>
  </div>
  </div>
  </div>
</div>
 
 
 <div class="footer-copyright" align="right">
        <div class="container-fluid">
            © 2017 Copyright. Vishal Varma

        </div>
    </div>
	 
	 
	 
	 
	 
	 <?php
require "conf/config.php";

if(isset($_POST["bt2"])){
	
$fn=$_POST["fn"];
$ln=$_POST["ln"];
$emi=$_POST["emi"];
$pw2=$_POST["pw2"];


$query="select * from quiz where email='$emi'";
$query_run=mysqli_query($con,$query);
if(mysqli_num_rows($query_run)>0)
{
	echo "<script>sweetAlert('Oops...','User already registered with that username!')</script>";
}
	else{$qu="insert into quiz values('$fn','$ln','$emi','$pw2')";
mysqli_query($con,$qu) or die ("error");
		echo "<script>sweetAlert('Congratulations!', 'User Registered', 'success');</script>";
	}
}
if(isset($_POST["bt1"]))
{$email=$_POST["e1"];
	$password=$_POST["pw1"];
	if($email=="admin" && $password=="admin")
	{
		header("location:admin.php");
	}
	
	$query1="select * from quiz where email='$email' and password='$password'";
	$query_ru=mysqli_query($con,$query1);
	if(mysqli_num_rows($query_ru)>0)
	{$row=mysqli_fetch_array($query_ru,MYSQLI_ASSOC);
	
		$fname=$row["fname"];
						$Lname=$row["Lname"];
						
						
		
		
		

		
		
		$_SESSION["fname"]=$fname;
		$_SESSION["Lname"]=$Lname;
		$_SESSION["email"]=$email;
		
		header("location:home.php");
		
		
	}
	else
	{
		
		echo "<script>sweetAlert('Oops...','invalid credintails!','error')</script>";
		
	}
	
}






?>







































</body>
</html> 