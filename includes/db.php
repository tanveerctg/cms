<?php
	
	$host="localhost";
    $name="root";
    $password="";
    $db="cms";
    $connection=mysqli_connect($host,$name,$password,$db);

    if(!$connection){
      die("connection failed".mysqli_connect_error());}
?>
