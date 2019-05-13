<?php 
	
	$db = new mysqli("localhost", "root", "" , "trello");

	if ($db->connect_errno) {
		printf("Connection failed %s\n", $db->connection_error);
		exit();
	}


 ?>