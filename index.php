<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style/all.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<?php 
	include 'header.php';
?>

<?php 
	if (isset($_SESSION["user_id"])) {
		header("Location: "."myfeed.php");			
	} 
?>

<section class="welcome_page">
	<div class="welcome_page__inner">
		<div class="welcome_page__inner___words">
			<h1>ScheduleBox lets you work more collaboratively and get more done.</h1>
			<p>Trello’s boards, lists, and cards enable you to organize and prioritize your projects in a fun, flexible, and rewarding way.</p>
			<a href="signup.php">Sign Up- It's Free!</a>
		</div>
		<div class="welcome_page__inner__image">
			<img src="images/flatdeskindex.jpg">
		</div>
	</div>
</section>
<section class="welcome_page white_background">
	<div class="welcome_page__inner">
		<div class="welcome_page__inner___words">
			<h1>Work with any team</h1>
			<p>Whether it’s for work, a side project or even the next family vacation, Trello helps your team stay organized.</p>
			<a href="signup.php">Sign Up - It's Free!</a>
		</div>
		<div class="welcome_page__inner__image">
			<img src="images/laptop-index.png">
		</div>
	</div>
</section>
<section class="welcome_page white_background">
	<div class="welcome_page__inner iphone">

		<div class="welcome_page__inner__image iphone">
			<img src="images/iphone-index.png">
		</div>
		<div class="welcome_page__inner___words">
			<h1>Work with any team</h1>
			<p>Whether it’s for work, a side project or even the next family vacation, Trello helps your team stay organized.</p>
			<a href="signup.php">Sign Up- It's Free!</a>
		</div>
	</div>
</section>

</body>
</html>