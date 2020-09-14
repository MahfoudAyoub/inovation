		<div class="col-lg-12">
			<div class="panel panel-default" style="height:50px;">
				<span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong>Chat Room: <?php echo $chatrow['chat_name']; ?></strong></span>
				<div class="pull-right" style="margin-right:10px; margin-top:7px;">
					<span id="user_details" style="font-size:18px; position:relative; top:2px;"><strong>Members: </strong><span class="badge"><?php echo mysqli_num_rows($cmem); ?></span></span>
					<a href="#add_member" data-toggle="modal" class="btn btn-primary">Add Member</a>
					<a href="#delete_room" data-toggle="modal" class="btn btn-danger">Delete Room</a>
					<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
				</div>
				<div class="showme hidden" style="position: absolute; left:570px; top:20px;">
					<div class="well">
						<strong>Room Member/s:</strong>
						<div style="height: 10px;"></div>
						<?php
						$rm = mysqli_query($conn, "select * from chat_member left join `users` on users.id=chat_member.userid where chatroomid='$id'");
						while ($rmrow = mysqli_fetch_array($rm)) {
						?>
							<span>
								<?php
								$creq = mysqli_query($conn, "select * from chatroom where chatroomid='$id'");
								$crerow = mysqli_fetch_array($creq);

								if ($crerow['userid'] == $rmrow['userid']) {
								?>
									<span class="glyphicon glyphicon-user"></span>
								<?php
								}

								?>
								<?php echo $rmrow['uname']; ?></span><br>
						<?php
						}

						?>

					</div>
				</div>
			</div>
			<div>
				<div class="panel panel-default" style="height: 400px;width:490px;margin:0 auto;">
					<div style="height:10px;"></div>
					<span style="margin-left:10px;">Welcome to Chatroom</span><br>
					<span style="font-size:12px; margin-left:10px; color:crimson;"><i>Note: Avoid using foul language and hate speech to avoid banning of account</i></span>
					<div style="height:10px;"></div>
					<div id="chat_area" style="margin-left:10px; max-height:320px; overflow-y:scroll;">
					</div>
				</div>


				<div class="input-group" style="height: 400px;width:490px;margin:0 auto;">
					<div>
						<input type="text" class="form-control" placeholder="Type message..." id="chat_msg">
						<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png" alt="">
						<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_file.png" alt="">
					</div>
					<div>
						<button style="margin-left: 400px;" class="btn btn-success" type="submit" id="send_msg" value="<?php echo $id; ?>">
							<span class="glyphicon glyphicon-comment"></span> Send
						</button>
					</div>
				</div>


			</div>
		</div>