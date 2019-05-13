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
				Log In
			</div>
			<div class="loginForm">
				<form method="POST" action="api/auth/signin.php">
					<fieldset>
						<input type="text" name="login" placeholder="Email &#8902">
					</fieldset>
					<fieldset>
						<input type="password" name="password" placeholder="Password &#8902">
					</fieldset>
					<button type="submit"> get started</button>
				</form>
			</div>
			<div style ="margin-bottom: 5%;" id="regger" data-onsuccess="onSignIn"></div>
		</div>
	</div>

<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="js/signin.js" type="text/javascript"></script>
<script type="text/javascript">
		
	function onSuccess(googleUser) {
	  console.log('Logged in as: ' + googleUser.getBasicProfile().getName());

	  var profile = googleUser.getBasicProfile();
	  // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
	  // console.log('Name: ' + profile.getName());
	  // console.log('Image URL: ' + profile.getImageUrl());
	  // console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
	  // console.log(profile);
	  //  var id_token = googleUser.getAuthResponse().id_token;
	  //  console.log(id_token);
	  $.ajax({
			method:"POST",
			url: "api/auth/signupGoogle.php",
			data: {
				full_name: profile.getName(),
				imageUrl: profile.getImageUrl(),
				email: profile.getEmail()
			}
		}).done(function(data){//get info from blog if exist FOR HOME if response = 200
			window.location.href = "myfeed.php";
		}).fail(function(err){
			console.log(err);
		});
	}


	function onFailure(error) {
	  console.log(error);
	}

	function renderButton() {
	  gapi.signin2.render('regger', {
	    'scope': 'profile email',
	    'width': 240,
	    'height': 50,
	    'longtitle': true,
	    'theme': 'dark',
	    'onsuccess': onSuccess,
	    'onfailure': onFailure
	  });
	}
</script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

</body>
</html>