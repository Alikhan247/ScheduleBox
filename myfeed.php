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
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	
</head>

<body>
<?php 
	include "header.php";

	if (!isset($_SESSION["user_id"])) {
		header("Location: "."login.php");
	}
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
			<button class="team_button">
				<i class="fas fa-plus"></i>
				<a href="team.php">
					<span>Go to team</span>
				</a>
			</button>
		</div>
	</div>

	<div class="all_boards" id="all_boards">
<!-- 		<div class="starred_boards">
			<div class="boards_header_section">
				<div class="board_header">
					<i class="fas fa-star"></i>
					<h3>Starred Boards</h3>
				</div>
				<ul class="board_section_list">
					<li class="col2">
						<div class="board_section_list__element_text">
							<a style="color: white" href="board.php">Activity Tasks</a>
						</div>
					</li>
				</ul>
			</div>
		</div> -->

		<div class="personal_boards">
			<!-- <div class="boards_header_section">
				<div class="board_header">
					<i class="fas fa-user-alt"></i>
					<h3>Personal Boards</h3>
				</div>
				<ul class="board_section_list">
					<li class="col2">
						<a href="board.php">
							<div class="board_section_list__element_text">
								Activity Tasks
							</div>
						</a>
					</li>
					<li class="col2">
						<a href="">
							<div class="board_section_list__element_text">
								Project
							</div>
						</a>
					</li>
					<li class="col2">
						<a href="">
							<div class="board_section_list__element_text">
									Stuff
							</div>
						</a>
					</li>
					<li class="col2">
						<a href="">
							<div class="board_section_list__element_text">
								Programming
							</div>
						</a>
					</li>
					<li class="board_creator col2">
						<a href="">
							<div class="board_section_list__board_creator__text">
								Create a new board...
							</div>
						</a>
					</li>
				</ul>
			</div> -->
		</div>
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
<script type="text/javascript" src="js/myfeed.js"></script>
<script type="text/javascript" src="js/logoutEnabler.js"></script>
</body>
</html>