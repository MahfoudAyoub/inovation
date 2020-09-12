<?php
	session_start();
	include('../conn.php');
	
	$sq=mysqli_query($conn,"select * from `users` where id='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);

	$user=$srow['username'];
	$photo=$srow['photo'];
?>