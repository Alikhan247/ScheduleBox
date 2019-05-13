<?php 

	include "../../db.php";

	$id = $_POST["id"];

	$db->query("DELETE FROM element WHERE id = $id");

	echo true;

 ?>