<?php
	include('../conn.php');
	if(isset($_POST['fetch'])){
		$id = $_POST['id'];
		
		$query=mysqli_query($conn,"select * from `chat` left join `users` on users.id=chat.userid where chatroomid='$id' order by chat_date asc") or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		?>	
		<div>
			<img src="../<?php if(empty($row['photo'])){echo "upload/profile.jpg";}else{echo $row['photo'];} ?>" style="height:30px; width:30px; position:relative; top:15px; left:10px;">
			<span style="font-size:12px; font:bold; position:relative; top:7px; left:15px;"><i><?php echo date('M-d-Y h:i A',strtotime($row['chat_date'])); ?></i></span><br>
			<span style="font-size:12px; font:message-box; color:darkmagenta; position:relative; top:-2px; left:50px;"><strong><?php echo $row['uname']; ?></strong> <strong style="font:xx-large; color:black">: <?php echo $row['message']; ?></strong></span>
		</div>
		<div style="height:5px;"></div>
		<?php
		}
	}	
?>