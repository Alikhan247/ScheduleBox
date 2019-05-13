<?php 

	include "../../db.php";
	$query = $db -> query("SELECT * FROM images");

	$output = array();

	if ($query ->num_rows>0){
		while($row = $query -> fetch_object()) {

			//$query2 = $db -> query("SELECT * FROM boards WHERE desk_id ='".$row->id."'");
			$items = array();
			if ($query ->num_rows>0){
				$output[] = array(
					"id"=>$row->id,
					"content"=>$row->name,
					"img"=>$row->path
				);
			}
		}
	}

	echo json_encode($output);

 ?>