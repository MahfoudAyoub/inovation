<div class="navbar">
	<div class="navbar_left">
		<div class="logo">
			<a href="<?php echo BASE_URL . '/index.php' ?>">ART-MODE</a>
		</div>
	</div>

	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li><a href="index.php"><i class="fas fa-comments"></i> Chat Rooms</a></li>
			<li><a href="user.php"><i class="fas fa-users-cog"></i> Users</a></li>
			<li><a href=<?php echo BASE_URL . "/admin/dashboard.php"?>><i class="fas fa-upload"></i></span> Dashboard</a></li>
		</ul>
	</div>

	<div style="margin-right: 20px;" class="navbar_right">
		<div class="profile">
			<div class="icon_wrap">
				<li style="margin-right: 8px;" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#photo" data-toggle="modal"><span class="glyphicon glyphicon-picture"></span> Update Photo</a></li>
						<li class="divider"></li>
						<li><a href="#logout" data-toggle="modal"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					</ul>
				</li>
				<img src="../<?php if (empty($photo)) {
									echo "upload/profile.jpg";
								} else {
									echo $photo;
								} ?>" height="30px;" width="30px;" alt="profile_pic">
				<li style="margin-left: 8px;"><a href="#account" data-toggle="modal"> <?php echo $user; ?></a></li>
			</div>
		</div>
	</div>
</div>

