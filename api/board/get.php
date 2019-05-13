<?php 

	include "../../db.php";

	if (isset($_GET["desk_id"])) {
		$desk_id = $_GET["desk_id"];
	}
	// ToDo: Here is the problem, you cant parse everything using only it's name! You have to use board ID to get these boards else you will see board with the same name in other desks.
	

	$query = $db -> query("SELECT * FROM boards WHERE desk_id = $desk_id");

	$output = array();

	if ($query ->num_rows>0){
		while($row = $query -> fetch_object()) {

			$query2 = $db->query("SELECT * FROM element WHERE board_id='".$row->_id."'");
			$items = array();
			if ($query2 ->num_rows>0){
				while($row2 = $query2 -> fetch_object()) {
					$items[] = array(
						"id"=>$row2->id,
						"content"=>$row2->content,
						"board_id"=>$row2->board_id
					);
				}
			}


			$output[] = array("id"=>$row->_id,
								"name"=>$row->board_name,
								"items" => $items);
		}
	}

	echo json_encode($output);

 ?>