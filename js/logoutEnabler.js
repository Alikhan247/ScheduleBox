 function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function () {
	});
	auth2.disconnect();
	console.log('Person is disconnected');
	window.location.href = "api/auth/logout.php";
  }

gapi.load('auth2', function () {
	gapi.load('auth2', () => {

	    gapi.auth2.init({ client_id: "673977532265-gt6as7v883r8ug998tbs6btfprtnl8ab.apps.googleusercontent.com" }).then(() => {

	       console.log('gapi initiated');
	    });
	});
})