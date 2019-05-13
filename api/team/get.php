<?php 

	include "../../db.php";

	session_start();

	$user_id = $_SESSION["user_id"]; 

	$query = $db -> query("SELECT * FROM teams INNER JOIN desks on desks.id = teams.desk_id WHERE teams.user_id = $user_id");//ToDo: This query may not work but at least you should try

	$output = array();

	if ($query ->num_rows>0){
		while($row = $query -> fetch_object()) {

			//$query2 = $db -> query("SELECT * FROM boards WHERE desk_id ='".$row->id."'");
			$items = array();
			if ($query ->num_rows>0){
				$output[] = array(
					"id"=>$row->id,
					"content"=>$row->name,
					"img"=>$row->img
				);
			}
		}
	}

	echo json_encode($output);

 ?>