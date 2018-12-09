<?php
	session_start();
	session_unset();
	session_destroy();
	if(isset($_SERVER['QUERY_STRING'])&&!empty($_SERVER['QUERY_STRING']))
		header('Location: ../../index.php?login=failed');
	else
		header('Location: ../../index.php');
?>