<!DOCTYPE html>
<html>
<head>
	<title>Boards</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style/all.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script
	  src="https://code.jquery.com/jquery-3.4.0.js"
	  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
	  crossorigin="anonymous">
	</script>
	
</head>

<body>
<?php 
	include "header.php";
 ?>

<div class="home_container">
	<div class="home_container_left_sidebar">
		<div class="home_left_box_container">
			<ul>
				<li>
					<a href="">
						<i class="fas fa-pencil-alt"></i>
						<span>Boards</span>
					</a>
				</li>
				<li>
					<a href="">
						<i class="fas fa-home"></i>
						<span>Home</span>
					</a>
				</li>
			</ul>
			<div class="left_box_container_team">Teams</div>
			<div class="team_options">
				<ul>
					<li>
						<a href="highlights.php">
							<i class="far fa-heart"></i>
							<span>Highlights</span>
						</a>
					</li>
					<li>
						<a href="">
							<i class="fas fa-pencil-alt"></i>
							<span>All team boards</span>
						</a>
					</li>
					<li>
						<a href="">
							<i class="fas fa-user-friends"></i>
							<span>Members</span>
						</a>
					</li>
					<li>
						<a href="">
							<i class="fas fa-cog"></i>
							<span>Settings</span>
						</a>
					</li>
				</ul>
			</div>
			<button class="team_button">
				<i class="fas fa-plus"></i>
				<span>Create a team</span>
			</button>
		</div>
	</div>

	<div class="all_boards" id="all_boards">
		<div class="team_boards">
			
		</div>
	</div>

	<div class="modal" id="modal">
		<div class="modal_backdrop" onclick="closeMenu()"></div>
		<div class="modal_inner" id="modal_inner">
				<div class="modal_close">
					<span class="modal_close_sign" onclick="closeMenu()">X</span>
				</div>
			<form onsubmit="addElement(event)">
				<fieldset class="form_field">
					<input id="add_board" class="input" type="text" name="name" placeholder="Add board title">
				</fieldset>
				<fieldset class="form_field">
					<input type="file" id="img" style="display: none;">
				</fieldset>
				<fieldset class="form_field">
					<button class="button button_block">Add card</button>
				</fieldset>
			</form>	
		</div>
		<div class="moadal_inner_background">
			<div id="background_img1"></div>
			<div id="background_img2"></div>
			<div id="background_img3"></div>
			<div id="background_col1"></div>
			<div id="background_col2"></div>
			<div id="background_col3"></div>
			<div id="background_col4"></div>
			<div id="background_col5"></div>
			<div id="background_col6">...</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/team.js"></script>
<script type="text/javascript" src="js/logoutEnabler.js"></script>
</body>
</html>