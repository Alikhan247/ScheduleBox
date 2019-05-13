<?php 

	include "../../db.php";

	session_start();

	$user_id = $_SESSION["user_id"]; 

	$query = $db -> query("SELECT * FROM highlights WHERE user_id = $user_id");

	$output = array();

	if ($query ->num_rows>0){
		while($row = $query -> fetch_object()) {
			$items = array();
			if ($query ->num_rows>0){
				$output[] = array(
					"id"=>$row->id,
					"name"=>$row->name,
					"description"=>$row->description
				);
			}
		}
	}

	echo json_encode($output);

 ?>