<?php 

	include '../../db.php';

	$key = $_GET['key'];

	$query = $db->query("SELECT * FROM users WHERE full_name LIKE '%$key%' OR email LIKE '%$key%'
		ORDER BY date DESC");



	$res = array();
	
	if ($query ->num_rows>0){
		while ($row = $query -> fetch_object()) {
			$res[]=array(
				"id" => $row->id,
				"email" => $row->email,
				"name" =>$row->full_name
			);
		}
	}

	echo json_encode($res);

 ?>