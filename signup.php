<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/all.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-signin-client_id" content="673977532265-gt6as7v883r8ug998tbs6btfprtnl8ab.apps.googleusercontent.com">
		<script
	  src="https://code.jquery.com/jquery-3.4.0.js"
	  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
	  crossorigin="anonymous">
	</script>
</head>
<body>
	<div class="login_wrapper">
		<div class="login_container">
			<div class="login_container__logo">
				Sign Up For Free
			</div>
			<div class="loginForm">
				<form method="POST" action="api/auth/signup.php">
					<fieldset>
						<input type="text" name="full_name" placeholder="Full Name &#8902">
					</fieldset>
					<fieldset>
						<input type="text" name="email" placeholder="Email &#8902">
					</fieldset>
					<fieldset>
						<input type="password" name="password" placeholder="Password &#8902">
					</fieldset>
					<fieldset>
						<input type="password" name="passwordConfirm" placeholder="Confirm your password &#8902">
					</fieldset>
					<button type="submit"> get started</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html>