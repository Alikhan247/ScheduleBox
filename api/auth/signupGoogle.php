<?php 
	include "../../db.php";
	include "../../config.php";

	if(isset($_POST["full_name"]) && strlen($_POST["full_name"])>0&&
		isset($_POST["imageUrl"]) && strlen($_POST["imageUrl"])>0&&
		isset($_POST["email"]) && strlen($_POST["email"])>0){

		$login = $_POST["email"];
		$full_name = $_POST["full_name"];
		$img = $_POST["imageUrl"];

		$exist = $db->query("SELECT * FROM users WHERE email = '$login'");

		if ($exist->num_rows > 0) {
			$row = $exist -> fetch_object();
			session_start();
			$_SESSION['user_id'] = $row->id;
			echo true;
		} else {
			$db->query("INSERT INTO users(email, full_name, img) VALUES('$login','$full_name', '$img')");
			// echo "$login";
			// echo "$full_name";
			// echo "$img";
			$exist2 = $db->query("SELECT * FROM users WHERE email = '$login'");
			$row2 = $exist2 -> fetch_object();
			session_start();
			$_SESSION['user_id'] = $row2->id;
			echo true;
		}

	} else {
	}

 ?>
