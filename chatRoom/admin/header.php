<!DOCTYPE html>
<html>

<head>

	<title>Chat Room | ART-MODE</title>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>


	<link href="../css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="../css/adminHeader.css" rel="stylesheet">
	<link href="../css/dataTables.responsive.css" rel="stylesheet">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		img {
			max-width: 100%;
			border-radius: 50%;
			height:30px; 
			width:30px;

		}

		#chat {
			padding-left: 0;
			margin: 0;
			list-style-type: none;
			border-top: 2px solid #fff;
			border-bottom: 2px solid #fff;
		}

		#chat li {
			padding: 10px 20px;
		}

		#chat h2,
		#chat h3 {
			display: inline-block;
			font-size: 13px;
			font-weight: normal;
		}

		#chat h3 {
			color: #bbb;
		}

		#chat .entete {
			margin-bottom: 5px;
		}

		#chat .message {
			padding: 15px;
			color: #fff;
			line-height: 20px;
			max-width: 90%;
			display: inline-block;
			text-align: left;
			border-radius: 5px;
		}

		#chat .me {
			text-align: right;
		}

		#chat .you .message {
			background-color: #58b666;
		}

		#chat .me .message {
			background-color: #6fbced;
		}

		#chat .triangle {
			width: 0;
			height: 0;
			border-style: solid;
			border-width: 0 10px 10px 10px;
		}

		#chat .you .triangle {
			border-color: transparent transparent #58b666 transparent;
			margin-left: 15px;
		}

		#chat .me .triangle {
			border-color: transparent transparent #6fbced transparent;
			margin-left: 375px;
		}
	</style>

</head>