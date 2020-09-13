<div class="col-lg-12">
    <div class="panel panel-default" style="height:50px;">
		<span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong><span class="glyphicon glyphicon-user"></span> User List</strong></span>
		<div class="pull-right" style="margin-right:10px; margin-top:7px;">
			<a href="#add_user" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add</a>
		</div>
	</div>
	<table width="100%" class="table table-striped table-bordered table-hover" id="userList">
        <thead>
            <tr>
                <th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Photo</th>
				<th>Access</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query=mysqli_query($conn,"select * from `users` order by uname asc");
			while($row=mysqli_fetch_array($query)){
			?>
			<tr>
				<td><input type="hidden" id="ename<?php echo $row['id']; ?>" value="<?php echo $row['uname']; ?>"><?php echo $row['uname']; ?></td>
				<td><input type="hidden" id="eusername<?php echo $row['id']; ?>" value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></td>
				<td><input type="hidden" id="eemail<?php echo $row['id']; ?>" value="<?php echo $row['email']; ?>"><?php echo $row['email']; ?></td>
				<td><input type="hidden" id="eaddress<?php echo $row['id']; ?>" value="<?php echo $row['address']; ?>"><?php echo $row['address']; ?></td>
				<td><input type="hidden" id="ephone<?php echo $row['id']; ?>" value="<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></td>
				<td><img src="../<?php if(empty($row['photo'])){echo "upload/profile.jpg";}else{echo $row['photo'];} ?>" height="30px;" width="30px;"></td>
				<td>
					<?php 
						if ($row['access']==1){
							echo "Admin";
						}
						else{
							echo "User";
						}
					?>
				</td>
				<td> 
					<button type="button" class="btn btn-warning edituser" value="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></button> || 
					<button type="button" class="btn btn-danger deleteuser" value="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
			</tr>
			<?php
			}
		?>
        </tbody>
    </table>                     
</div>