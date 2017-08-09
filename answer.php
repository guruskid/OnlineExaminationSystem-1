<?php

require "conf/config.php";
session_start();


$cnt=$_SESSION["count"];
$ide=$_SESSION["catid"];
$answer=array();
$bas=1;
$query5="select * from question where cname='$ide'";
	$query_rute=mysqli_query($con,$query5);
	while($row=mysqli_fetch_array($query_rute,MYSQLI_ASSOC)){
	$answer["$bas"]=$row["answer"];
	$bas++;
	}
$ansR=array();
$index=1;
foreach($_POST as $it)
{$ansR[$index++]=$it;
	
	
}
	
	$right=0;
	$wrong=0;
	$unanswered=0;
	
	
	for($i=1;$i<=$cnt;$i++){
if($ansR["$i"]>4){
	$unanswered++;

}
	else
	{
	{if($ansR["$i"]==$answer["$i"])
	$right++;
else $wrong++;}}

		
		
	
	}
	$percent=($right/$cnt)*100;
	
	if(isset($_POST["logout"]))
{
 session_destroy();
 header("location:index.php");
	
}

	
	
	
	
	
	
	
?>



<html>
 <head> <title>Score</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body style="background:#2c3e50">
	  <div class="container" style="background:#ecf0f1;border-radius: 15px 50px 30px;margin-top:10px;">
	  <br>
	  <form method="post" action="answer.php">
	   <ul class="nav nav-tabs" role="tablist">
    
    <li><a href="home.php">Home</a></li>
    
   <li style="float:right;"><button type="submit" class="btn btn-danger" name="logout" onclick="return confirm('are you sure you want to logout?')" >Logout</button></li>    
  </ul>
	  
	  </form>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  <div class="row">
  <div class="col-sm-2"></div>
	  
	  <div class="col-sm-8">
	  <center> <h3 style="margin-top:75px">Your Quiz Score:<h3></center>
	 <center> <img src="result.jpg" style="height:150px;margin-top:30px"></img></center>
	  
	  
	  </div>
	  
	   <div class="col-sm-2"></div>
	  </div>
	  
	  
	  
 
 <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8" style="margin-top:50px;border-radius:25px">
 

  <div style="padding:50px">
  <table class="table table-bordered" >
    
       <tr class="success"> <th>Correct</th>
	   <td><?php echo $right?></td>
	   </tr>
	   
        <tr class="danger"><th>Incorrect</th>
		<td><?php echo $wrong?></td></tr>
		
		<tr class="active"><th>No Answer</th>
		<td><?php echo $unanswered;?></td>
		
		</tr>
        <tr class="info"><th>Total</th>
		<td><?php echo "$right/$cnt ($percent%)";?></td>
      </tr>
    
    
  </table>
  </div></div>

	   <div class="col-sm-2">
	   



		</div>
	 </div>
	  
	  
	  
    </div>
	
</body>
</html>

















