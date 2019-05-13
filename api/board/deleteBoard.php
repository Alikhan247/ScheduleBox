<?php 

	include "../../db.php";

	$boardName = $_POST["boardName"];

	$db->query("DELETE FROM boards WHERE board_name = '$boardName'");

	echo true;

 ?>