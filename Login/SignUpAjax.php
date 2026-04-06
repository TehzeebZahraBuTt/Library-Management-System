<?php
$conn=mysqli_connect("localhost","root","","db_lms");
if ($_POST['type']=="match") {
	$email=$_POST['email'];
	

	$sql="SELECT * FROM users WHERE user_email='$email'";
	$res=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($res);
	if ($num>0) {
		
		echo "This email already exist";
		
	}

} 






?>