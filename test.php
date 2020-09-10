<style type="text/css">
	.comment {
		margin-bottom: 20px;
	}

	.user {
		font-weight: bold;
		color: black;
	}

	.time,
	.reply {
		color: gray;
	}

	.userComment {
		color: #000;
	}

	.replies .comment {
		margin-top: 20px;

	}

	.replies {
		margin-left: 20px;
	}
</style>
<div>

	<div class="row">
		<div class="col-md-12">
			<input class="text-input" id="mainComment" placeholder="Add Public Comment" cols="30" rows="2"></input><br>
			<button style="float:right" class="btn-primary btn" id="addComment">Add Comment</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3><b><?php echo $numComments ?> Comments</b></h3>
			<div class="userComments">

			</div>
		</div>
	</div>
</div>