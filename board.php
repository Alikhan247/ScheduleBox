<!DOCTYPE html>
<html>
<head>
	<title>Board</title>
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
	include 'header.php';
	if (!isset($_SESSION["user_id"])) {
		header("Location: "."login.php");
	}

 ?>

<?php 
	if (isset($_GET["desk"])) {
		$desk_id = $_GET["desk"];
		$query2 = $db -> query("SELECT img FROM desks WHERE id = $desk_id");
		$row2 = $query2 -> fetch_object();
	}	
	if (strpos($row2->img, "rgb")!== false) {
		$background = 'background-color:'.$row2->img;
	} else {
		$background = "background-image:"."url("."$row2->img".")";
	}
?>


<div class="all_contained" style='<?php echo "$background"; ?>'>
	 <div class="container">
 	<div class="options_container">
 		<div class="board_name">Activity Task</div>
 		<ul class="options_container__items">
 			<li><i class="fas fa-star"></i></li>
 			<span class="button_divider"></span>
 			<li><button>Personal</button></li>
 			<span class="button_divider"></span>
 			<li><i class="fas fa-lock"></i><button>Private</button></li>
 			<span class="button_divider"></span>
 			<li><button>User</button></li>
 			<span class="button_divider"></span>
 			<li>
 				<button id="invite_button">Invite</button>
 				<div class="invite_back" id="invite_back"></div>
 				<div class="usersDropDown" id="usersDropDown">
				    <div class="usersDropDown__inside">
				    	<h1>Invite To Board</h1>
				    	<form onsubmit="inviteUser(event)">
				    		<fieldset>
				    			<input type="text" name="" id="searchPeople" onkeyup = "findPeople()" placeholder="Name or Email address">
				    		</fieldset>
				    		<div class="peopleList" id="peopleList">
				    			
				    		</div>
				    		<fieldset>
				    			<textarea id="comment" name="comment" placeholder="Let your collaborators know what you are working on"></textarea>
				    		</fieldset>
				    		<button type="submit">Invite!</button>
				    	</form>
				    </div>
 				</div>
 			</li>
 		</ul>
 	</div>
 </div>
 <div id="list"></div>

 <div class="board_conatainer" id="board_conatainer">
 </div>
 </div>

	<div class="modal2" id="modal">
		<div class="modal_backdrop" onclick="closeMenu()"></div>
		<div class="modal_inner2">
			<div class="header_close2">
				<div class="modal_close2">
					<span class="modal_close_sign2" onclick="closeMenu()">X</span>
				</div>
				<h1 class="modal_title2">Add a card</h1>
			</div>
			<form onsubmit="addElement(event)">
					<fieldset class="form_field">
						<input id="add_card" class="input" type="text" name="" placeholder="Card">
					</fieldset>
					<fieldset class="form_field">
						<button class="button button_block">Add card</button>
					</fieldset>
			</form>	
		</div>
	</div>

<!-- 
<div class="modal2" id="modal">
		<div class="modal_backdrop2" onclick="showModal()"></div>
		<div class="modal_inner2">
			<span class="modal_close" onclick="showModal()">X</span>
			<h1 class="modal_title2">Add student</h1>
			<form onsubmit="addStudent(event)">
					<fieldset class="form_field">
						<input id="student_id" class="input" type="text" name="" placeholder="ID">
					</fieldset>
			</form>	
		</div>
</div>
 -->


 <script type="text/javascript" src="js/boards.js"></script>
 <script type="text/javascript" src="js/dragManager.js"></script>

</body>
</html>