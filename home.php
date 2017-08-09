<?php
session_start();
require "conf/config.php";
if(isset($_POST["logout"]))
{
 session_destroy();
 header("location:index.php");
	
}

?>
<script>


function tuv()
{
swal({
  title: "Hello "+"<?php echo $_SESSION['fname'];?>",
  text:"You are logged in!",
  imageUrl: "log1.png"
});

}

</script>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Exam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="sweetalert.min.js"></script>
<link rel="stylesheet" href="sweetalert.css" />
</head>
<body onload="tuv()">
<form action="home.php" method="post">
<div class="container">
  <h2>Online Exam</h2>
  <ul class="nav nav-tabs">
    <li class="active"><button type="button" class="btn btn-default" id="pro" data-toggle="tab" href="#home">Home</button></center></li>
 
    <li style="float:right;"><button type="submit" class="btn btn-danger" name="logout" onclick=" return confirm('Are you sure to logout?')" >Logout</button></li>
	   <li style="float:right;margin-right:10px;><button type="button" class="btn btn-info" id="pro" data-toggle="tab" href="#menu1">profile</button></center></li>
  </ul>
</form>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     
     <center><button type="button" class="btn btn-primary" id="sel1" data-toggle="tab" href="#select1" style="margin:60px">Start Test!</button></center>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	<?php

$query1="select * from category ";
	$query_ru1=mysqli_query($con,$query1);
$cat=array();
$count=0;

	while($row=mysqli_fetch_array($query_ru1,MYSQLI_ASSOC))
	{
		$cat[]=$row["cname"];
		$count++;
			
			
	}		

   
  
  

  
	
  



?>	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	  <div class="row">
  <div class="col-sm-3"></div>
  
  
  
  
  
  
  <div class="col-sm-6">
  <form action="ques.php" method="post">
  <div id="select1" class="tab-pane fade" style="margin:100px"> 
	  <h3>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  Choose Subject</h3>
  <select class="form-control" name="catg">
 <?php  
for($i=0;$i<$count;$i++) {
	$ic=$i+1;
echo "<option value='$cat[$i]'>$cat[$i]</option>";
}
?>
  </select>
  
  
 
    <center><input type="submit" class="btn btn-success" style="margin-top:200px" value="enter" name="enter"></center>
 
  
</div>
</form>

</div>







  <div class="col-sm-3"> </div>
</div> 
	  
	 
	 
	 
	 
	 
	 
	 
  



  </div>
    <div id="menu1" class="tab-pane fade" style="margin-top:50px;border-radius:10px">
     
      
	
	  <div class="container">
	  <div class="row">
  <div class="col-sm-3">.</div>
  <div class="col-sm-6" style="background:#ecf0f1;">
  
	   
	
	  <center><img src="profile.png" style="height:145px;margin-top:25px;">
	  </center>
  
  <div style="padding:20px">
  <table class="table table-bordered" >
    <thead>
      <tr class="danger">
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td><?php  echo $_SESSION["fname"];
	  ?></td>
        <td><?php echo $_SESSION["Lname"];
	  ?></td>
        <td><?php echo $_SESSION["email"];
	  ?></td>
      </tr>
     
    </tbody>
  </table>
  </div></div>
  <div class="col-sm-3"></div>
</div>
</div>
	  
	 
	  
	  
	  
    </div>
	
	 
	
	
	

   
  
    
  </div>
</div>

</body>
</html>









