<?php 
		session_start();
		
		if(!isset($_SESSION["user_id"])){
	
?>

<header class="header2">
	<div class="container2">
		<div class="header_inner2">
			<div class="header_inner__logo">
				<div>
					<i class="fas fa-home"></i>
				</div>
				<div>
					ScheduleBox
				</div>
			</div>

			<div class="login_options">
				<a class ="login_options__button" href="login.php">Log In</a>
				<a class="login_options__button" href="signup.php">Sign Up</a>
			</div>
		</div>
	</div>
</header>

<?php 

}else{

	$user_id = $_SESSION["user_id"];

	include "db.php";
	$query = $db -> query("SELECT * FROM users WHERE id = $user_id");

	$user_name ="";
	if ($query ->num_rows>0){

		$row = $query -> fetch_object();

		if (isset($row->img) && strlen($row->img)>0) {
			$img_path = $row->img;
			//Change It Later!
			//You have to get Only initials
			$user_full_name = explode(" ", $row->full_name);
			$user_full_name2 = $row->full_name;
			$initials = null;
			foreach ($user_full_name as $w) {
			     $initials .= $w[0];
			}
		}
	}
 
 ?>
<header class="header">
	<div class="container">
		<div class="header_inner">
			<div class="header_left">
				<div class="header_left__home_button">
					<a href="index.php">
						<i class="fas fa-home"></i>
					</a>
				</div>
				<div class="header_left__boards_button">
					<div class="boards_button__icon">
						<i class="fas fa-pencil-alt"></i>
					</div>
					<div>Boards</div>
				</div>
				<div class="header_left__input">
					<input type="text" class="fa fa-input" placeholder="&#xf002">
				</div>
			</div>

			<div class="header_logo" id="header_logo">
				My Boards
			</div>

			<div class="header_right">
				<div class="header_right_button">
					<div class="right_button__icon">
						<a onclick="signOut()" ><i class="fas fa-sign-out-alt"></i></a>
					</div>
					<div class="right_button__icon">
						<a href=""><i class="fas fa-info-circle"></i></a>
					</div>
					<div class="right_button__icon">
						<a href=""><i class="fas fa-bell"></i></i></a>
					</div>
					<div class="right_button__icon__image">
						<?php 
							if (isset($row->img) && strlen($row->img)>0) {							
						?>
						<img src="<?php echo $img_path;  ?>" alt = "<?php echo $initials ?>" onerror="this.src='images/nothing.png'">
						<?php 
							}else {
								echo $initials;
							}
						?>
					<div class="menu_back"></div>
					<div class="person-options">
						<h1>Hi, <?php echo $user_full_name2; ?></h1>
						<span class="exit_button">X</span>
						<div class="list">
							<button>Profile</button>
							<button>Cards</button>
							<button>Settings</button>
							<button>Help</button>
							<div class="divider"></div>
							<button>Log Out</button>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php 
} 
?>