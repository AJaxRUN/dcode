<?php
	session_start();
	if(!(array_key_exists('register', $_SESSION)&&$_SESSION['register']=="success"))
		header("Location: ../../index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>D Code</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<style type="text/css">
		body {
			 background: url(../../src/images/bg.jpg);
		}
		.bg {
			background-color: rgba(255, 255, 255, 0.6);
			padding: 60px;
			border-radius: 30px;
		}
	</style>
</head>
<body>
	<div class="bg text-xs-center">
	  <h1 class="display-3">Thank You!</h1>
	  <p class="lead"><strong>We will send an email within 48hrs</strong> in the registered mail ID for further instructions on how to complete your account setup, after approving the request.</p>
	  <hr>
	  <p>
	    Any queries? <p>Contact us:<p>dcodedevelopers@gmail.com</p></p>
	  </p>
	  <p class="lead">
	    <a class="btn btn-primary btn-sm" href="../../index.php" role="button">Go to login page.</a>
	  </p>
	</div>
</body>
</html>
