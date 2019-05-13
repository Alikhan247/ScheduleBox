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
	echo true;
	}


 ?>