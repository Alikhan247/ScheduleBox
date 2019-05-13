<?php 

	include "../../db.php";

	session_start();

	if (isset($_SESSION["user_id"])) {
		$user_id = $_SESSION["user_id"];
	}
	

	if (isset($_POST["id"]) && strlen($_POST["id"])>0 &&
	isset($_POST["full_name"]) && strlen($_POST["full_name"])>0 &&
	isset($_POST["desk_id"]) && strlen($_POST["desk_id"])>0) {

		$person_id = $_POST["id"];
		$full_name = $_POST["full_name"];
		$desk_id = $_POST["desk_id"];
		$comment = $_POST["comment"];

		$query = $db -> query("SELECT img FROM desks WHERE id =$desk_id");

		if ($query ->num_rows>0){
			$row = $query -> fetch_object();
			$img = $row->img;
		}
		$query2 = $db -> query("SELECT full_name FROM users WHERE id = $user_id");

		if ($query ->num_rows>0){
			$row2 = $query2 -> fetch_object();
			$senderName = $row2->full_name;
		}

		$db->query("INSERT INTO teams(img, desk_id, user_id) VALUES ('$img', $desk_id, $person_id)");
		$db->query("INSERT INTO highlights(name, description, user_id, sender_id) VALUES ('$senderName', '$comment', $person_id, $user_id)");
		
		echo true;
	}

 ?>