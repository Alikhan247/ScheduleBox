<?php 

	include "../../db.php";

	session_start();

	$img_path = NULL;

	if (isset($_SESSION["user_id"])&& isset($_POST["imagePath"]) && isset($_POST["boardContent"])) {
		$user_id = $_SESSION["user_id"];
		$img_path = $_POST["imagePath"];
		$boardContent = $_POST["boardContent"];
	}

	

	if (isset($_POST["boardContent"]) && strlen($_POST["boardContent"])>0) {
		$db->query("INSERT INTO desks(name, img, user_id) VALUES ('$boardContent', '$img_path', $user_id)");

		$query = $db -> query("SELECT * FROM desks WHERE user_id = $user_id AND name = '$boardContent'");
		if ($query ->num_rows>0){
			$row = $query -> fetch_object();
			$db->query("INSERT INTO teams(name, img, desk_id, user_id) VALUES ('$boardContent', '$img_path', $row->id, $user_id)");
		}
	echo true;
	}


 ?>