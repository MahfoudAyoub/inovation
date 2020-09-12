<?php
	include('session.php');
	if(isset($_POST['adduser'])){
		$name=$_POST['name'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$access=$_POST['access'];
		
		mysqli_query($conn,"insert into `users` (uname, username, password, access) values ('$name', '$username', '$password', '$access')");
	}

?>