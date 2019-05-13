<?php 
	include "../../db.php";
	include "../../config.php";

	if(isset($_POST["email"]) && strlen($_POST["email"])>0&&
		isset($_POST["full_name"]) && strlen($_POST["full_name"])>0&&
		isset($_POST["password"]) && strlen($_POST["password"])>0&&
		isset($_POST["passwordConfirm"]) && strlen($_POST["passwordConfirm"])>0){

		$login = $_POST["email"];
		$full_name = $_POST["full_name"];
		$password = $_POST["password"];
		$password2 = $_POST["passwordConfirm"];

		$exist = $db->query("SELECT * FROM users WHERE login = '$login'");

		if ($exist->num_rows > 0) {
			header("Location: $base_url"."signup.php?error=2");
		}elseif ($password != $password2) {
			header("Location: $base_url"."signup.php?error=3");
		} else {
			$db->query("INSERT INTO users(email, full_name, password) VALUES('$login','$full_name','".sha1($password)."')");
			header("Location: $base_url"."login.php");
		}

	} else {
		header("Location: $base_url"."signup.php?error=1");
	}

 ?>