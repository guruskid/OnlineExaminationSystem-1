<?php
$host="localhost";
$username="root";
$pass="";
$con=mysqli_connect($host,$username,$pass) or die("could not connect");
mysqli_select_db($con,"vishal") or die("cant connect to db");



?>