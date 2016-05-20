<?php 
	$conn=new mysqli("localhost","root","","proekt");
	if($conn->connect_error){
		die("fail".$conn->connect_error);
	}
 ?>