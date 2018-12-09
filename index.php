<?php
	ob_start();
	session_start();

	//Global varaibles
	$url = "http://localhost/DCode/";
	$query = $_SERVER['QUERY_STRING'];

	if(!isset($_SESSION['login']))
		$_SESSION['login'] = false;
	//Redirect to register page
	if(strpos($query, "register")!=false){
		redirect_page("modules/register_module/register.php");
	}

	//Redirect to login page
	if(!$_SESSION['login'])
	{
		if(isset($query)&&!empty($query))
			redirect_page("modules/login_module/login.php?"+$query);
		else
			redirect_page("modules/login_module/login.php");
	}
	
	//Home page after login
	else if($_SESSION['login'] == true)
	{
		if($_SESSION["admin"]==true)
			redirect_page("modules/landing_module/request.php");
		else
			redirect_page("modules/landing_module/userlogin.php");
	}

	//Function to load login page
	function redirect_page($str)
	{
		global $url;
		header("Location: $url".$str);
		exit();
	}
?>
