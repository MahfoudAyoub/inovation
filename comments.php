<style type="text/css">
	.comment {
		margin-bottom: 20px;
	}

	.user {
		font-weight: bold;
		color: blueviolet;
	}

	.time,
	.reply {
		margin-top: 5px;
		color: gray;
		font-weight: bold;
	}

	.userComment {
		color: #000;
		margin-top: 5px;
	}

	.replies .comment {
		margin-top: 20px;

	}

	.replies {
		margin-left: 20px;
	}
</style>


<div class="row">
	<div class="col-md-12">
		<input class="text-input" id="mainComment" placeholder="Add Public Comment" cols="30" rows="2"></input><br>
		<button style="float:right" class="btn-primary btn" id="addComment">Add Comment</button>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h3><b id="numComments"><?php echo $numComments ?> Comments</b></h3>
		<div class="userComments">

		</div>
	</div>
</div>

<div class="row replyRow" style="display:none">
	<div class="col-md-12">
		<input class="text-input" id="replyComment" placeholder="Add Public Comment" cols="30" rows="2"></input><br>
		<button style="float:right" class="btn-primary btn" onclick="isReply = true;" id="addReply">Add Reply</button>
		<button style="float:right" class="btn-default btn" onclick="$('.replyRow').hide();">Close</button>
	</div>
</div>