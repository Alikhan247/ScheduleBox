<?php 
	require ("vendor/autoload.php");

	//Step 1: Enter you google account credentials
	$g_client = new Google_Client();
	$g_client->setClientId("673977532265-gt6as7v883r8ug998tbs6btfprtnl8ab.apps.googleusercontent.com");
	$g_client->setClientSecret("H5voWmWzprXCfRR4jeLV9pm-");
	$g_client->setRedirectUri("http://localhost/ScheduleBox/api/auth/google.php");
	$g_client->setScopes("email");

	//Step 2 : Create the url
	$auth_url = $g_client->createAuthUrl();
	echo "<a href='$auth_url'>Login Through Google </a>";

	//Step 3 : Get the authorization  code
	$code = isset($_GET['code']) ? $_GET['code'] : NULL;
	//var_dump($code);

	//Step 4: Get access token
	if(isset($code)) {
	    try {
	        $token = $g_client->fetchAccessTokenWithAuthCode($code);
	        $g_client->setAccessToken($token);
	    }catch (Exception $e){
	        echo $e->getMessage();
	    }
	    try {
	        $pay_load = $g_client->verifyIdToken();
	        //var_dump($pay_load);
	    }catch (Exception $e) {
	        echo $e->getMessage();
	    }
	} else{
	    $pay_load = null;
	}
	if(isset($pay_load)){
		//echo $pay_load["email"];	 
		header("Location: "."signin.php");
	}
