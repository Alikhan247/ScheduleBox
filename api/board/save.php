<?php 

	include "../../db.php";

	

	if (isset($_POST["cardContent"]) && strlen($_POST["cardContent"])>0 &&
	isset($_POST["boardId"]) && strlen($_POST["boardId"])>0) {

		$cardContent = $_POST["cardContent"];
		$board_id = $_POST["boardId"];
		$board_name = $_POST["boardName"];


		$db->query("INSERT INTO element(content, board_id, board_name) VALUES ('$cardContent', $board_id, '$board_name')");
	echo true;
	}

	if (isset($_POST["boardName"]) && strlen($_POST["boardName"])>0 &&
	isset($_POST["desk_id"]) && strlen($_POST["desk_id"])>0) {


		$board_name = "board_".$_POST["boardName"];
		$desk_id = $_POST["desk_id"];

		$db->query("INSERT INTO boards(board_name, desk_id) VALUES ('$board_name', $desk_id)");
	echo true;
	}


 ?>