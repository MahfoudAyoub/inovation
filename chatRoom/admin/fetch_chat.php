<?php
include('../conn.php');
include('session.php');
if (isset($_POST['fetch'])) {
	$id = $_POST['id'];

	$query = mysqli_query($conn, "select * from `chat` left join `users` on users.id=chat.userid where chatroomid='$id' order by chat_date asc") or die(mysqli_error());
	while ($row = mysqli_fetch_array($query)) {
?>
		<ul id="chat" >
			<?php if ($_SESSION['id'] == $row['userid']) : ?>
				<li class="me">
					<div class="entete">
						<h3><?php echo date('M-d-Y h:i A', strtotime($row['chat_date'])); ?></h3>
						<h2><?php echo $row['uname']; ?></h2><img src="../<?php if(empty($row['photo'])){echo "upload/profile.jpg";}else{echo $row['photo'];} ?>">

						<span class="status blue"></span>
					</div>
					<div class="triangle"></div>
					<div class="message">
						<?php echo $row['message']; ?>
					</div>
				</li>
			<?php else : ?>
				<li class="you">
					<div class="entete">
						<img src="../<?php if(empty($row['photo'])){echo "upload/profile.jpg";}else{echo $row['photo'];} ?>">
						<h2><?php echo $row['uname']; ?></h2>
						<span class="status blue"></span>
						<h3><?php echo date('M-d-Y h:i A', strtotime($row['chat_date'])); ?></h3>
					</div>
					<div class="triangle"></div>
					<div class="message">
						<?php echo $row['message']; ?>
					</div>
				</li>
			<?php endif; ?>
		</ul>

<?php
	}
}
?>