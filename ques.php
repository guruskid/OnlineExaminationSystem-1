<?php
require "conf/config.php";
session_start();

$cat_id=$_POST['catg'];
$id=array();
$question=array();
$ans1=array();
$ans2=array();
$ans3=array();
$ans4=array();
$answer=array();
$count=0;
$qno=1;


$query4="select * from question where cname='$cat_id'";
	$query_rut=mysqli_query($con,$query4);
	while($row=mysqli_fetch_array($query_rut,MYSQLI_ASSOC)){
	$id[]=$row["id"];
	$question[]=$row["quest"];
	$ans1[]=$row["ans1"];
	$ans2[]=$row["ans2"];
	$ans3[]=$row["ans3"];
	$ans4[]=$row["ans4"];
	$answer[]=$row["answer"];
		$count++;
	
		
		
	}
	
	$_SESSION["count"]="$count";
$_SESSION["catid"]="$cat_id";
	

   
	?>
	
	<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
function timeout()
{var minute=Math.floor(timeleft/60);
var sec=Math.floor(timeleft%60);
if(timeleft<=0){
clearTimeout(tm);
document.getElementById("form1").submit();



}
else{

document.getElementById("timeshow1").innerHTML="Time left :-"+minute+":"+sec;}
timeleft--;
var tm=setTimeout(function()(timeout()),1000);

}




</script>
  
  
  
  
  
  
  
  
  
  </head>
  
<body style="background:#ecf0f1;" onload="timeout()">

<div class="container" >

<h4><div style="float:right;background-color:#bdc3c7;margin-top:5px;" id="timeshow1"></div></h4>
<img src="clk.png" style="float:right;margin-right:5px;height:30px"></img>
 <div class="row">
  <div class="col-sm-3"></div>





 <div class="col-sm-6">
 <form action="answer.php" method="post" id="form1">
 <center><img src="quiz.png"style="margin-top:25px;height:200px;"></img>
 
 
 <?php 
  for($i=0;$i<$count;$i++)
  
  
  {$qno=$i+1;
  
                      
 echo"<table class='table table-bordered'>
  <thead>
      <tr class='danger'>
       <th> $qno) $question[$i]</th>
      </tr>
    </thead>
    <tbody>
      <tr class='active'>
  <td><input type='hidden' name='$id[$i]'  value='10' />
  1<input type='radio' name='$id[$i]' value='0'> $ans1[$i] </td>
        
      </tr>
      <tr class='active'>
        
 <td>2 <input type='radio' name='$id[$i]' value='1'>  $ans2[$i] </td>
      </tr>
     <tr class='active'>
        
         <td> 3 <input type='radio' name='$id[$i]' value='2'>  $ans3[$i] </td>
		</tr>
        
       <tr class='active'> <td> 4 <input type='radio' name='$id[$i]' value='3'>  $ans4[$i] </td>
     
      </tr>
    </tbody>
  </table>";
  }
 
  ?>
  <center><input type='submit' class='btn btn-success' style='margin-top:5px' value='Submit Test!' name='test'></center>
  </div>
    <?php echo"<script>var timeleft=$qno*10</script>"?>

<div class="col-sm-3"></div>
</div>
</center>
</body>
</html>

	
	
	
	
	
	
	
	
	
	
